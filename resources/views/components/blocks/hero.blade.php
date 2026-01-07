@props(['data' => [], 'company' => null])

@php
    $alignment = $data['alignment'] ?? 'center';
    $backgroundImage = null;

    if (!empty($data['background_image'])) {
        // Handle media library image
        if (is_numeric($data['background_image'])) {
            $media = $company?->getMedia('hero_images')->firstWhere('id', $data['background_image']);
            $backgroundImage = $media?->getUrl('hero') ?? $media?->getUrl();
        } else {
            $backgroundImage = $data['background_image'];
        }
    }
@endphp

<section class="relative bg-gray-900 text-white overflow-hidden" @if($backgroundImage) style="background-image: url('{{ $backgroundImage }}'); background-size: cover; background-position: center;" @endif>
    @if($backgroundImage)
        <div class="absolute inset-0 bg-black/50"></div>
    @endif

    <div class="relative container mx-auto px-4 py-16 md:py-24 lg:py-32">
        <div class="max-w-4xl mx-auto text-{{ $alignment }}">
            @if(!empty($data['title']))
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-4 leading-tight">
                    {{ $data['title'] }}
                </h1>
            @endif

            @if(!empty($data['subtitle']))
                <p class="text-lg md:text-xl text-gray-200 mb-8">
                    {{ $data['subtitle'] }}
                </p>
            @endif

            @if(!empty($data['button_text']) && !empty($data['button_url']))
                <a
                    href="{{ $data['button_url'] }}"
                    class="inline-block px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition-colors duration-200"
                >
                    {{ $data['button_text'] }}
                </a>
            @endif
        </div>
    </div>
</section>
