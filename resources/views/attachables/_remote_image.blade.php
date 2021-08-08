<figure class="attachment attachment--preview attachment--{{ $remoteImage->extension() }}" @if ($gallery ?? false) data-trix-attributes='{"presentation":"gallery"}' @endif>
    <img src="{{ $remoteImage->url }}" width="{{ $remoteImage->width }}" height="{{ $remoteImage->height }}" />
    @if (method_exists($remoteImage, 'caption'))
        <figcaption class="attachment__caption">
            {{ $remoteImage->caption() }}
        </figcaption>
    @elseif (property_exists($remoteImage, 'caption'))
        <figcaption class="attachment__caption">
            {{ $remoteImage->caption }}
        </figcaption>
    @endif
</figure>
