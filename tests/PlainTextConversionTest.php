<?php

namespace Tonysm\RichTextLaravel\Tests;

use Tonysm\RichTextLaravel\Content;

class PlainTextConversionTest extends TestCase
{
    /** @test */
    public function p_tags_are_separated_by_two_new_lines()
    {
        $this->assertConvertedTo(
            "Hello World!\n\nHow are you?",
            '<p>Hello World!</p><p>How are you?</p>',
        );
    }

    /** @test */
    public function blockquote_tags_are_separated_by_two_new_lines()
    {
        $this->assertConvertedTo(
            "“Hello world!”\n\n“How are you?”",
            "<blockquote>Hello world!</blockquote><blockquote>How are you?</blockquote>"
        );
    }

    /** @test */
    public function ol_tags_are_separated_by_two_new_lines()
    {
        $this->assertConvertedTo(
            "Hello world!\n\n1. list1\n\n1. list2\n\nHow are you?",
            "<p>Hello world!</p><ol><li>list1</li></ol><ol><li>list2</li></ol><p>How are you?</p>"
        );
    }

    /** @test */
    public function ul_tags_are_separated_by_two_new_lines()
    {
        $this->assertConvertedTo(
            "Hello world!\n\n• list1\n\n• list2\n\nHow are you?",
            "<p>Hello world!</p><ul><li>list1</li></ul><ul><li>list2</li></ul><p>How are you?</p>"
        );
    }

    public function headings()
    {
        return [
            'h1' => [
                'expected' => "Hello world!\n\nHow are you?",
                'content' => "<h1>Hello world!</h1><div>How are you?</div>",
            ],
            'h2' => [
                'expected' => "Hello world!\n\nHow are you?",
                'content' => "<h2>Hello world!</h2><div>How are you?</div>",
            ],
            'h3' => [
                'expected' => "Hello world!\n\nHow are you?",
                'content' => "<h3>Hello world!</h3><div>How are you?</div>",
            ],
            'h4' => [
                'expected' => "Hello world!\n\nHow are you?",
                'content' => "<h4>Hello world!</h4><div>How are you?</div>",
            ],
            'h5' => [
                'expected' => "Hello world!\n\nHow are you?",
                'content' => "<h5>Hello world!</h5><div>How are you?</div>",
            ],
            'h6' => [
                'expected' => "Hello world!\n\nHow are you?",
                'content' => "<h6>Hello world!</h6><div>How are you?</div>",
            ],
        ];
    }

    /**
     * @dataProvider headings
     * @test
     */
    public function heading_tags_are_separated_by_two_new_lines($expected, $content)
    {
        $this->assertConvertedTo($expected, $content);
    }

    /** @test */
    public function li_tags_are_separated_by_one_new_line()
    {
        $this->assertConvertedTo(
            "• one\n• two\n• three",
            "<ul><li>one</li><li>two</li><li>three</li></ul>"
        );
    }

    /** @test */
    public function li_tags_without_parent_list()
    {
        $this->assertConvertedTo(
            "• one\n• two\n• three",
            "<li>one</li><li>two</li><li>three</li>"
        );
    }

    /** @test */
    public function br_are_separated_by_one_new_line()
    {
        $this->assertConvertedTo(
            "Hello world!\none\ntwo\nthree",
            "<p>Hello world!<br>one<br>two<br>three</p>"
        );
    }

    /** @test */
    public function divs_are_separated_by_one_new_line()
    {
        $this->assertConvertedTo(
            "Hello world!\nHow are you?",
            "<div>Hello world!</div><div>How are you?</div>"
        );
    }

    /** @test */
    public function figcaptions_are_converted_to_plain_text()
    {
        $this->assertConvertedTo(
            "Hello world! [A condor in the mountain]",
            "Hello world! <figcaption>A condor in the mountain</figcaption>"
        );
    }

    /** @test */
    public function rich_text_attachments_are_converted_to_plain_text()
    {
        $this->assertConvertedTo(
            "Hello world! [Cat]",
            'Hello world! <rich-text-attachment url="http://example.com/cat.jpg" content-type="image" caption="Cat"></rich-text-attachment>',
        );
    }

    /** @test */
    public function preserves_non_linebreaks_white_spaces()
    {
        $this->assertConvertedTo(
            "Hello world!",
            "<div><strong>Hello </strong>world!</div>"
        );
    }

    /** @test */
    public function preserves_trailing_linebreaks()
    {
        $this->assertConvertedTo(
            "Hello\nHow are you?",
            "<strong>H<i><em>e</em></i>llo<br></strong>How are you?"
        );
    }

    /** @test */
    public function handles_deeply_nested()
    {
        // @TODO: refactor this for big documents. We should use while loops instead of recursively looping through the document.
        ini_set('xdebug.max_nesting_level', 1000);

        $deeply = "<div>How are you?</div>";

        foreach (range(1, 100) as $i) {
            $deeply = "<div>{$deeply}</div>";
        }

        $this->assertConvertedTo(
            "Hello world!\nHow are you?",
            "<div>Hello world!</div>{$deeply}",
        );
    }

    private function assertConvertedTo($expected, $content): void
    {
        $actual = (new Content($content))->toPlainText();

        $this->assertEquals($expected, $actual);
    }
}
