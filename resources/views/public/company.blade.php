@foreach ($company->content ?? [] as $block)
    @if ($block['type'] === 'image')
        @php        
            $mediaItems = $company->getMedia('images');
        @endphp

        @foreach ($mediaItems as $media)
            <div class="image-block">
                <img src="{{ $media->getUrl() }}" alt="Firmenbild" style="max-width: 100%; height: auto;">
            </div>
        @endforeach
    @elseif ($block['type'] === 'heading')
        <h2>{{ $block['heading'] }}</h2>
    @elseif ($block['type'] === 'text')
        <div>{!! $block['text'] !!}</div>
    @elseif ($block['type'] === 'list')
        <ul>
            @foreach ($block['items'] ?? [] as $item)
                <li>{{ $item['item'] }}</li>
            @endforeach
        </ul>
    @endif
@endforeach
