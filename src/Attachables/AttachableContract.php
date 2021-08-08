<?php

namespace Tonysm\RichTextLaravel\Attachables;

interface AttachableContract
{
    public function richTextContentType(): string;

    public function richTextPreviewable(): bool;

    public function richTextFilename(): ?string;

    public function richTextFilesize();

    public function richTextMetadata(?string $key);

    public function richTextSgid(): string;

    public function toRichTextAttributes(array $attributes = []): array;

    public function richTextRender($content = null, array $options = []): string;
}
