<h1>{{ $company->name }}</h1>
@if ($company->hasMedia('logo'))
    <img
        src="{{ $company->getFirstMediaUrl('logo') }}"
        alt="{{ $company->name }} Logo"
        style="max-width: 200px; margin-bottom: 1rem;"
    >
@endif
@foreach ($company->content ?? [] as $block)
    @if ($block['type'] === 'image' && isset($block['image']))
        <div class="image-block">
            <img src="{{ $block['image']->getUrl() }}" alt="Firmenbild" style="max-width: 100%; height: auto;">
        </div>
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
