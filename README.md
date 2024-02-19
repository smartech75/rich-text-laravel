<p align="center" style="margin-top: 2rem; margin-bottom: 2rem;"><img src="/art/rich-text-laravel-logo.svg" alt="Logo Rich Text Laravel" /></p>

<p align="center">
    <a href="https://github.com/tonysm/rich-text-laravel/workflows/run-tests/badge.svg">
        <img src="https://img.shields.io/github/actions/workflow/status/tonysm/rich-text-laravel/run-tests.yml?branch=main" />
    </a>
    <a href="https://packagist.org/packages/tonysm/rich-text-laravel">
        <img src="https://img.shields.io/packagist/dt/tonysm/rich-text-laravel" alt="Total Downloads">
    </a>
    <a href="https://packagist.org/packages/tonysm/rich-text-laravel">
        <img src="https://img.shields.io/github/license/tonysm/rich-text-laravel" alt="License">
    </a>
</p>

Integrates the [Trix Editor](https://trix-editor.org/) with Laravel. Inspired by the Action Text gem from Rails.

## Installation

You can install the package via composer:

```bash
composer require tonysm/rich-text-laravel
```

Then, you may install it running:

```bash
php artisan richtext:install
```

### Blade Components

If you're using the [Importmap Laravel](https://github.com/tonysm/importmap-laravel) package, make sure you add the Trix core styles Blade Component to the `head` tag on your layout file(s):

```blade
<x-rich-text::styles />
```

If you're using breeze, you might want to set `theme=richtextlaravel` prop to this styles component:

```blade
<x-rich-text::styles theme="richtextlaravel" />
```

If you're using Laravel Mix/Webpack, the `resources/js/trix.js` file has the JS setup and the CSS import as well, so no need to use the the Blade Component.

The package also publishes a Blade Component for you which can be used inside your forms, like so:

```blade
<x-trix-input id="bio" name="bio" />
```

## Overview

We extract attachments before saving the rich text field (which uses Trix) in the database and minimize the content for storage. Attachments are replaced with `rich-text-attachment` tags. Attachments from attachable models have a `sgid` attribute, which should globally identify them in your app.

When storing images directly (say, for a simple image uploading where you don't have a model for representing that attachment in your application), we'll fill the `rich-text-attachment` with all the attachment's properties needded to render that image again. Storing a minimized (canonical) version of the rich text content means we don't store the inner contents of the attachment tags, only the metadata needded to render it again when needed.

There are two ways of using the package:

1. With the recommended database structure where all rich text content will be stored outside of the model that has rich text content (recommended); and
1. Only using the `AsRichTextContent` trait to cast a rich text content field on any model, on any table you want.

Below, we cover each usage way. It's recommended that you at least read the [Trix documentation](https://github.com/basecamp/trix) at some point to get an overview of the client-side of it.

### The RichText Model
<a name="rich-text-model"></a>

The recommended way is to keep the rich text content outside of the model itself. This will keep the models lean when you're manipulating them, and you can (eagerly or lazily) load the rich text fields only where you need the rich text content.

Here's how you would have two rich text fields on a Post model, say you need one for the body of the content and another one for internal notes you may have:

```php
use Tonysm\RichTextLaravel\Models\Traits\HasRichText;

class Post extends Model
{
    use HasRichText;

    protected $guarded = [];

    protected $richTextAttributes = [
        'body',
        'notes',
    ];
}
```

This trait will create [dynamic relationships](https://laravel.com/docs/8.x/eloquent-relationships#dynamic-relationships) on the Post model, one for each field. These relationships will be called: `richText{FieldName}` and you may define the fields using underscore, so if you had a `internal_notes` field, that would have a `richTextInternalNotes` relationship added on the model.

For a better DX, the trait will also add a custom cast for the `body` and `notes` fields on the Post model to forward setting/getting operations to the relationship, since these fields will NOT be stored in the posts table. This means that you can use the Post model like this:

```php
$post = Post::create(['body' => $body, 'notes' => $notes]);
```

And you can interact with the rich text fields just like you would with any regular field on the Post model:

```php
$post->body->render();
```

Again, there's no `body` or `notes` fields on the Post model, these _virtual fields_ will forward interactions to the relationship of that field. This means that when you interact with these fields, you're actually interacting with an instance of the `RichText` model. That model will have a `body` field that holds the rich text content. This field is then casted to an instance of the [`Content`](./src/Content.php) class. Calls to the RichText model will be forwarded to the `body` field on the `RichText` model, which is an instance of the `Content` class. This means that instead of:

```php
$post->body->body->attachments();
```

Where the first "body" is the virtual field which will be an instance of the RichText model and the second "body" is the rich text content field on that model, which is an instance of the `Content` class, you can do:

```php
$post->body->attachments();
```

Similarly to the Content class, the RichText model will implement the `__toString` magic method and render the HTML content (for the end user) by casting it to a string, which in blade can be done like this:

```blade
{!! $post->body !!}
```

*Note*: since the HTML output is NOT escaped, make sure you sanitize it before rendering. You can use something like the [mews/purifier](https://github.com/mewebstudio/Purifier) package, see the [sanitization](#sanitization) section for more about this.

The `HasRichText` trait will also add an scope which you can use to eager load the rich text fields (remember, each field will have its own relationship), which you can use like so:

```php
// Loads all rich text fields (1 query for each field, since each has its own relationship)
Post::withRichText()->get();

// Loads only a specific field:
Post::withRichText('body')->get();

// Loads some specific fields (but not all):
Post::withRichText(['body', 'notes'])->get();
```

The database structure for this example would be something like this:

```
posts
    id (primary key)
    created_at (timestamp)
    updated_at (timestamp)

rich_texts
    id (primary key)
    field (string)
    body (long text)
    record_type (string)
    record_id (unsigned big int)
    created_at (timestamp)
    updated_at (timestamp)
```

| 💡 If you use UUIDs, you may modify the migration that creates the `rich_texts` table to use `uuidMorphs` instead of `morphs`. However, that means all your model with Rich Text content must also use UUIDs. |
|------------------------|

We store a back-reference to the field name in the `rich_texts` table because a model may have multiple rich text fields, so that is used in the dynamic relationship the `HasRichText` creates for you. There's also a unique constraint on this table, which prevents having multiple entries for the same model/field pair.

Rendering the rich text content back to the Trix editor is a bit differently than rendering for the end users, so you may do that using the `toTrixHtml` method on the field, like so:

```blade
<x-trix-input id="post_body" name="body" value="{!! $post->body->toTrixHtml() !!}" />
```

Next, go to the [attachments](#attachments) section to read more about attachables.

### The AsRichTextContent Trait
<a name="asrichtextcontent-trait"></a>

In case you don't want to use the recommended structure (either because you have strong opinions here or you want to rule your own database structure), you may skip the entire recommended database structure and use the `AsRichTextContent` custom cast on your rich text content field. For instance, if you're storing the `body` field on the `posts` table, you may do it like so:

```php
use Tonysm\RichTextLaravel\Casts\AsRichTextContent;

class Post extends Model
{
    protected $casts = [
        'body' => AsRichTextContent::class,
    ];
}
```

Then the custom cast will parse the HTML content and minify it for storage. Essentially, it will convert this content submitted by Trix which has only an image attachment:

```php
$post->update([
    'content' => <<<HTML
    <h1>Hello World</h1>
    <figure data-trix-attachment='{
        "url": "http://example.com/blue.jpg",
        "width": 300,
        "height": 150,
        "contentType": "image/jpeg",
        "caption": "Something cool",
        "filename":"blue.png",
        "filesize":1168
    }'>
        <img src="http://example.com/blue.jpg" width="300" height="150" />
        <caption>
            Something cool
        </caption>
    </figure>
    HTML,
])
```

To this minified version:

```html
<h1>Hello World</h1>
<rich-text-attachment content-type="image/jpeg" filename="blue.png" filesize="1168" height="300" href="http://example.com/blue.jpg" url="http://example.com/blue.jpg" width="300" caption="testing this caption" presentation="gallery"></rich-text-attachment>
```

And when it renders it again, it will re-render the remote image again inside the `rich-text-attachment` tag. You can render the content for *viewing* by simply echoing out the output, something like this:

```blade
{!! $post->content !!}
```

*Note*: since the HTML output is NOT escaped, make sure you sanitize it before rendering. You can use something like the [mews/purifier](https://github.com/mewebstudio/Purifier) package, see the [sanitization](#sanitization) section for more about this.

When feeding the Trix editor again, you need to do it differently:

```blade
<x-trix-input id="post_body" name="body" value="{!! $post->body->toTrixHtml() !!}" />
```

Rendering for the editor is a bit different, so it has to be like that.

### Image Upload
<a name="image-upload"></a>

Trix shows the attachment button, but it doesn't work out-of-the-box, we must implement that behavior in our applications.

A basic version of attachments uploading would look something like this:

- Listen to the `trix-attachment-add` event on the Trix element (or any parent element, as it bubbles up);
- Implement the upload request. On this event, you get access to the Trix attachment instance, so you may update the progress on it if you want to, but this is not required;
- Once the upload is done, you must return the attachmentURL from upload endpoint, which you can use to set `url` and `href` attributes on the attachment itself. That's it.

The package contains a demo application with basic image uploading functionality implemented in the Workbench application. Here's some relevant links:

- The Stimulus controller that manages uploading (you should be able to map what's going on there to any JavaScript framework you'd like) can be found at [resources/views/components/app-layout.blade.php](workbench/resources/views/components/app-layout.blade.php), look for the "rich-text-uploader" Stimulus controller;
- The upload route can be found at [routes/web.php](workbench/routes/web.php), look for the `POST /attachments` route;
- The Trix Input Blade component at [resources/components/trix-input.blade.php](workbench/resources/views/components/trix-input.blade.php). This is copy of the component that ships with the package with some tweaks.

However, you're not limited to this basic attachment handling in Trix. A more advanced attachment behavior could create its own backend model, then set the `sgid` attribute on the attachment, which would let you have full control over the rendered HTML when the document renders outside the Trix editor.

### Content Attachments
<a name="attachments"></a>

With Trix we can have [content Attachments](https://github.com/basecamp/trix#inserting-a-content-attachment). In order to cover this, let's build a users mentions feature on top of Trix. There's a good [Rails Conf talk](https://youtu.be/2iGBuLQ3S0c?t=1556) building out this entire feature but with Rails. The workflow is pretty much the same in Laravel.

To turn _any_ model into an _Attachable_, you must implement the `AttachableContract`. You may use the `Attachable` trait to provide some basic _Attachable_ functionality (it implements most of the basic handling of attachables), except for the `richTextRender(array $options): string` method, which you must implement. This method is used to figure out how to render the content attachment both inside and outside of Trix.

The `$options` array passed to the `richTextRender` is there in case you're rendering multiple models inside a gallery, so you would get a `in_gallery` boolean field (optional) in that case, which is not the case for this user mentions example, so we can ignore it.

You may use Blade to render an HTML partial for the attachable. For a reference, the Workbench application ships with a User Mentions feature, which may be used as an example of content attachments. Here's some relevant links:

- The User model which implements the `AttachmentContract` can be found at [User Model](workbench/app/Models/User.php);
- The model uses a custom Trait called `Mentionee` which uses the `Attachable` trait under the hood, so take a look at the [Mentionee Trait](workbench/app/Models/User/Mentionee.php) trait;
- In the frontend, we're using [Zurb's Tribute](https://github.com/zurb/tribute) lib to detect mentions whenever the user types the `@` symbol in Trix. The Simulus controller that sets it up can be found at [resources/views/components/app-layout.blade.php](workbench/resources/views/components/app-layout.blade.php). Look for the "rich-text-mentions" controller. This is the same implement covered in the RailsConf talk mentioned earlier, so check that out if you need some help understanding what's going on. There are two Trix components in the workbench app, one used for posts and comments which may be found at [resources/views/components/trix-input.blade.php](workbench/resources/views/components/trix-input.blade.php) and one for the Chat composer, which may be found at [resources/views/chat/partials/trix-input.blade.php](workbench/resources/views/chat/partials/trix-input.blade.php). In both components you will find a `data-action` entry listening for the `tribute-replaced` event, that's the event Tribute will dispatch for us to create the Trix attachment, providing us the selected option the user has picked from the dropdown;
- The mentioner class will look for mentions in the `GET /mentions?search=` route, which you may find at [routes/web.php](workbench/routes/web.php). Note that we're turning the `sgid` and the `content` field, those are used for the Trix attachment. The `name` field is also returning, which is used by Tribute itself to compose the mentions feature.
- The Blade view that will render the user attachment can be found at [resources/views/mentions/partials/user.blade.php](workbench/resources/views/mentions/partials/user.blade.php)

You can later retrieve all attachments from that rich text content. See [The Content Object](#content-object) section for more.

### The Content Object
<a name="content-object"></a>

You may want to retrieve all the attachables in that rich text content at a later point and do something fancy with it, say _actually_ storing the User's mentions associated with the Post model, for example. Or you can fetch all the links inside that rich text content and do something with it.

#### Getting Attachments

You may retrieve all the attachments of a rich content field using the `attachments()` method both in the RichText model instance or the Content instance:

```php
$post->body->attachments()
```

This will return a collection of all the attachments, anything that is an attachable, really, so images and users, for instance - if you want only attachments of a specific attachable you can use the filter method on the collection, like so:

```php
// Getting only attachments of users inside the rich text content.
$post->body->attachments()
    ->filter(fn (Attachment $attachment) => $attachment->attachable instanceof User)
    ->map(fn (Attachment $attachment) => $attachment->attachable)
    ->unique();
```

#### Getting Links

To extract links from the rich text content you may call the `links()` method, like so:

```php
$post->body->links()
```

#### Getting Attachment Galleries

Trix has a concept of galleries, you may want to retrieve all the galleries:

```php
$post->body->attachmentGalleries()
```

This should return a collection of all the image gallery `DOMElement`s.

#### Getting Gallery Attachments

You may also want to get only the _attachments_ inside of image galleries. You can achieve that like this:

```php
$post->body->galleryAttachments()
```

Which should return a collection with all the attachments of the images inside galleries (all of them). You can then retrieve just the `RemoteImage` attachable instances like so:

```php
$post->body->galleryAttachments()
    ->map(fn (Attachment $attachment) => $attachment->attachable)
```

### Plain Text Rendering
<a name="plain-text"></a>

Trix content can be converted to anything. This essentially means `HTML > something`. The package ships with a `HTML > Plain Text` implementation, so you can convert any Trix content to plain text by calling the `toPlainText()` method on it:

```php
$post->body->toPlainText()
```

As an example, this rich text content:

```html
<h1>Very Important Message<h1>
<p>This is an important message, with the following items:</p>
<ol>
    <li>first item</li>
    <li>second item</li>
</ol>
<p>And here's an image:</p>
<rich-text-attachment content-type="image/jpeg" filename="blue.png" filesize="1168" height="300" href="http://example.com/blue.jpg" url="http://example.com/blue.jpg" width="300" caption="The caption of the image" presentation="gallery"></rich-text-attachment>
<br><br>
<p>With a famous quote</p>
<blockquote>Lorem Ipsum Dolor - Lorense Ipsus</blockquote>
<p>Cheers,</p>
```

Will be converted to:

```plaintext
Very Important Message

This is an important message, with the following items:

    1. first item
    1. second item

And here's an image:

[The caption of the image]

With a famous quote

“Lorem Ipsum Dolor - Lorense Ipsus”

Cheers,
```

If you're attaching models, you can implement the `richTextAsPlainText(?string $caption = null): string` method on it, where you should return the plain text representation of that attachable. If the method is not implemented on the attachable and no caption is stored in the Trix attachment, that attachment won't be present in the Plain Text version of the content.

| 💡 The plain text output representation is not HTML-safe. You must escape the plain text version generated. |
|------------------------|

### Sanitization
<a name="sanitization"></a>

Since we're rendering user-generated HTML, you must sanitize it to avoid any security issues. Even though we control the input element, malicious users may customize the HTML in the browser and swap it for something else that allows them to enter their own HTML.

We suggest using something like [mews/purifier](https://github.com/mewebstudio/Purifier) package before any final render (with the exception of rendering inside the value attribute of the input field that feeds Trix). That would look like this:

```php
{!! clean($post->body) !!}
```

You need to add some customizations to the config file created when you install the `mews/purifier` package, like so:

```php
return [
    // ...
    'settings' => [
        // ...
        'default' => [
            // ...
            'HTML.Allowed' => 'rich-text-attachment[sgid|content-type|url|href|filename|filesize|height|width|previewable|presentation|caption|data-trix-attachment|data-trix-attributes],div,b,strong,i,em,u,a[href|title],ul,ol,li,p[style],br,span[style],img[width|height|alt|src],del,h1,blockquote,figure[data-trix-attributes|data-trix-attachment],figcaption,*[class]',
        ],
        // ...
        'custom_definition' => [
            // ...
            'elements' => [
                // ...
                ['rich-text-attachment', 'Block', 'Flow', 'Common'],
            ],
        ],
        // ...
        'custom_attributes' => [
            // ...
            ['rich-text-attachment', 'sgid', new HTMLPurifier_AttrDef_Text],
            ['rich-text-attachment', 'content-type', new HTMLPurifier_AttrDef_Text],
            ['rich-text-attachment', 'url', new HTMLPurifier_AttrDef_Text],
            ['rich-text-attachment', 'href', new HTMLPurifier_AttrDef_Text],
            ['rich-text-attachment', 'filename', new HTMLPurifier_AttrDef_Text],
            ['rich-text-attachment', 'filesize', new HTMLPurifier_AttrDef_Text],
            ['rich-text-attachment', 'height', new HTMLPurifier_AttrDef_Text],
            ['rich-text-attachment', 'width', new HTMLPurifier_AttrDef_Text],
            ['rich-text-attachment', 'previewable', new HTMLPurifier_AttrDef_Text],
            ['rich-text-attachment', 'presentation', new HTMLPurifier_AttrDef_Text],
            ['rich-text-attachment', 'caption', new HTMLPurifier_AttrDef_Text],
            ['rich-text-attachment', 'data-trix-attachment', new HTMLPurifier_AttrDef_Text],
            ['rich-text-attachment', 'data-trix-attributes', new HTMLPurifier_AttrDef_Text],
            ['figure', 'data-trix-attachment', new HTMLPurifier_AttrDef_Text],
            ['figure', 'data-trix-attributes', new HTMLPurifier_AttrDef_Text],
        ],
        // ...
        'custom_elements' => [
            // ...
            ['rich-text-attachment', 'Block', 'Flow', 'Common'],
        ],
    ],
];
```

**Attention**: I'm not an expert in HTML content sanitization, so take this with an extra grain of salt and, please, consult someone more with more security experience on this if you can.

### Email Rendering

If you'd like to send your Trix content by email, it can be rendered in a [Mailable](https://laravel.com/docs/9.x/mail) and delivered to users. Laravel's default email theme presents Trix content cleanly, even if you're using Markdown messages.

To ensure your content displays well across different email clients, you should always sanitize your rendered HTML with the `mews/purifier` package, as detailed above, but using a custom ruleset to remove tags which could affect the message layout.

Add a new `mail` rule to the `mews/purifier` configuration (being mindful of earlier comments about sanitization and security):

```php
return [
    // ...
    'settings' => [
        // ...
        'mail'              => [
            'HTML.Allowed' => 'div,b,strong,i,em,u,a[href|title],ul,ol,li,p[style],br,span[style],img[alt|src],del,h1,h2,sup,blockquote,figure,figcaption,*[class]',
            'CSS.AllowedProperties'    => 'font,font-size,font-weight,font-style,font-family,text-decoration,padding-left,color,background-color,text-align',
            'AutoFormat.AutoParagraph' => true,
            'AutoFormat.RemoveEmpty'   => true,
        ],
        // ...
```

This rule differs from the normal configuration by removing `width` and `height` tags from `<img>` elements, and turning `<pre>` and `<code>` tags into normal paragraphs (as these seem to trip up the Markdown parser). If you rely on code blocks in Trix, you may be able to adjust the sanitizer ruleset to work around this.

To send the rich text content by email, create a Blade template for the message like in the example below:

```php
@component('mail::message')

# Hi {{ $user->name }},

## We've just published a new article: {{ $article->title }}

<!-- //@formatter:off -->
{!! preg_replace('/^ +/m', '', clean($article->content->render(), 'mail')) !!}
<!-- //@formatter:on -->

@endcomponent
```

Whilst the Blade message uses Markdown for the greeting, the Trix content will be rendered as HTML. This will only render correctly if it's *not indented in any way* — otherwise the Markdown parser tries to interpret nested content as code blocks.

The `preg_replace()` function is used to remove leading whitespace from each rendered line of Trix content, after it's been cleaned. The second parameter in the `clean()` function tells it to reference the `mail` config entry, described above.

The `//@formatter:*` comments are optional, but if you use an IDE like PhpStorm, these comments prevent it from trying to auto-indent the element if you run code cleanup tools.

### SGID

When storing references of custom attachments, the package uses another package called [GlobalID Laravel](https://github.com/tonysm/globalid-laravel). We store a Signed Global ID, which means users cannot simply change the sgids at-rest. They would need to generate another valid signature using the `APP_KEY`, which is secret.

In case you want to rotate your key, you would need to loop-through all the rich text content, take all attachables with an `sgid` attribute, assign a new value to it with the new signature using the new secret, and store the content with that new value.

### Livewire

If you're binding a model that has rich text fields to a Livewire component, you may add the `WithRichTexts` trait to your component. Also, it's recommended that you keep the rich text in raw form until the moment you want to save that to the Rich Text field, something like this:

```php
<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Tonysm\RichTextLaravel\Livewire\WithRichTexts;

class UserProfileForm extends Component
{
    use WithRichTexts;

    public User $user;
    public $bio = '';

    protected $rules = [
        'bio' => ['required'],
    ];

    public function mount(User $user)
    {
        $this->user = $user;
        $this->bio = $user->bio->toTrixHtml();
    }

    public function save()
    {
        $this->validate();

        $this->user->update([
            'bio' => $this->bio,
        ]);
    }
}
```

In this example, the User model has a `bio` rich text field.

<details>
<summary>See the contents of the User model in the example</summary>

```php
<?php

use Illuminate\Foundation\Auth\User as Authenticatable;
use Tonysm\RichTextLaravel\Models\Traits\HasRichText;

class User extends Model
{
    use HasRichText;

    protected $fillable = ['bio'];
    protected $richTextAttributes = ['bio'];
}
```

</details>

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Tony Messias](https://github.com/tonysm)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
