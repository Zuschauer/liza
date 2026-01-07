@props(['data' => [], 'company' => null])

@php
    $backgroundColor = $data['background_color'] ?? '#ffffff';
    $textColor = $data['text_color'] ?? '#1f2937';
    $padding = $data['padding'] ?? 'medium';

    $paddingClasses = match($padding) {
        'none' => '',
        'small' => 'py-8',
        'medium' => 'py-12',
        'large' => 'py-16',
        default => 'py-12',
    };
@endphp

<section
    class="w-full"
    style="background-color: {{ $backgroundColor }}; color: {{ $textColor }};"
>
    <div class="container mx-auto px-4 {{ $paddingClasses }}">
        @if(!empty($data['heading']))
            <h2 class="text-2xl md:text-3xl font-bold mb-6">
                {{ $data['heading'] }}
            </h2>
        @endif

        @if(!empty($data['content']))
            <div class="prose prose-lg max-w-none">
                {!! $data['content'] !!}
            </div>
        @endif
    </div>
</section>
