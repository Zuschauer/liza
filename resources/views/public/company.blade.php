<h1>{{ $company->name }}</h1>

@foreach ($company->content ?? [] as $block)
    @if ($block['type'] === 'heading')
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
