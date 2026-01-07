@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <!-- Hero Section mit Logo -->
        <div class="mb-12">
            <h1 class="text-3xl font-semibold">{{ $company->name }}</h1>

            <!-- Logo -->
            @if ($company->hasMedia('logo'))
                <div class="mt-4">
                    <img src="{{ $company->getFirstMediaUrl('logo') }}" alt="{{ $company->name }} Logo" class="max-w-xs">
                </div>
            @endif
        </div>

        <!-- Dynamische Content-Blöcke -->
        @php $content = $company->content ?? []; @endphp

        @if(!empty($content) && is_array($content))
            @foreach($content as $block)
                @php
                    $type = $block['type'] ?? null;
                    $data = $block['data'] ?? [];
                @endphp

                @if($type === 'hero')
                    @include('components.blocks.hero', ['data' => $data, 'company' => $company])
                @elseif($type === 'text_section')
                    @include('components.blocks.text-section', ['data' => $data, 'company' => $company])
                @elseif($type === 'skills')
                    @include('components.blocks.skills', ['data' => $data, 'company' => $company])
                @elseif($type === 'heading')
                    <h2 class="text-2xl font-bold mt-6">{{ $block['heading'] ?? '' }}</h2>
                @elseif($type === 'text')
                    <div class="text-gray-700 mt-4">{!! $block['text'] ?? '' !!}</div>
                @elseif($type === 'list')
                    <ul class="list-disc pl-5 mt-4">
                        @foreach($block['items'] ?? [] as $item)
                            <li>{{ $item['item'] ?? '' }}</li>
                        @endforeach
                    </ul>
                @elseif($type === 'image')
                    <div class="image-block mt-6">
                        @if(!empty($block['images']))
                            @if(is_array($block['images']))
                                @foreach($block['images'] as $imageId)
                                    @php
                                        $media = $company->getMedia('images')->firstWhere('id', $imageId);
                                    @endphp
                                    @if($media)
                                        <div class="mb-4">
                                            <img src="{{ $media->getUrl() }}" alt="Firmenbild" class="w-full h-auto rounded-lg shadow-lg">
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                        @endif
                    </div>
                @endif
            @endforeach
        @else
            <div class="text-center text-gray-500 py-12">
                <p>Keine Inhalte vorhanden. Fügen Sie Blöcke im Admin-Bereich hinzu.</p>
            </div>
        @endif
    </div>
@endsection
