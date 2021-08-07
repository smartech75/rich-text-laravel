<?php

namespace Tonysm\RichTextLaravel\Tests;

use DOMNode;
use Tonysm\RichTextLaravel\Fragment;
use Tonysm\RichTextLaravel\HtmlConversion;

class FragmentTest extends TestCase
{
    /** @test */
    public function creates_from_fragment()
    {
        $existing = new Fragment(
            HtmlConversion::fragmentForHtml("<h1>Hey there</h1>")->source
        );

        $fragment = Fragment::wrap($existing);

        $this->assertSame($existing, $fragment);
    }

    /** @test */
    public function creates_from_dom_fragment()
    {
        $source = HtmlConversion::fragmentForHtml("<h1>Hey there</h1>")->source;

        $fragment = Fragment::wrap($source);

        $this->assertInstanceOf(Fragment::class, $fragment);
        $this->assertSame($source, $fragment->source);
    }

    /** @test */
    public function creates_from_html()
    {
        $source = "<h1>hey there</h1>";

        $fragment = Fragment::wrap($source);

        $this->assertInstanceOf(Fragment::class, $fragment);
        $this->assertStringContainsString($source, $fragment->toHtml());
    }

    /** @test */
    public function finds_all()
    {
        $source = "<div>content</div><a href=\"http://example.com\">link one</a><a href=\"http:://example.com\">second link</a>";

        $fragment = Fragment::wrap($source);

        $links = $fragment->findAll('//a');

        $this->assertNotFalse($links);
        $this->assertCount(2, $links);
    }

    /** @test */
    public function replaces_fragments()
    {
        $source = "<div>something that wont change</div><h1>old title</h1>";

        $fragment = Fragment::wrap($source);

        $newFragment = $fragment->replace('//h1', function (DOMNode $node) {
            return HtmlConversion::fragmentForHtml("<h1>new title</h1>");
        });

        $this->assertNotSame($fragment, $newFragment);
        $this->assertStringNotContainsString('<h1>old title</h1>', $newFragment->toHtml());
        $this->assertStringContainsString('<div>something that wont change</div><h1>new title</h1>', $newFragment->toHtml());
    }
}
