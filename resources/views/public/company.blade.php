@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <!-- Hero Section -->
        <div class="mb-12">
            <h1 class="text-3xl font-semibold">{{ $company->name }}</h1>

            <!-- Logo -->
            @if ($company->hasMedia('logo'))
                <div class="mt-4">
                    <img src="{{ $company->getFirstMediaUrl('logo') }}" alt="{{ $company->name }} Logo" class="max-w-xs">
                </div>
            @endif
        </div>

        <!-- Content Section (text, images, etc.) -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Content Loop: Text and Image Blocks -->
            @foreach ($company->content ?? [] as $block)
                @if ($block['type'] === 'image')
                    <div class="image-block">
                        @foreach ($company->getMedia('images') as $media)
                            <div class="mb-4">
                                <img src="{{ $media->getUrl() }}" alt="Firmenbild" class="w-full h-auto rounded-lg shadow-lg">
                            </div>
                        @endforeach
                    </div>
                @elseif ($block['type'] === 'heading')
                    <h2 class="text-2xl font-bold mt-6">{{ $block['heading'] }}</h2>
                @elseif ($block['type'] === 'text')
                    <div class="text-gray-700 mt-4">{!! $block['text'] !!}</div>
                @elseif ($block['type'] === 'list')
                    <ul class="list-disc pl-5 mt-4">
                        @foreach ($block['items'] ?? [] as $item)
                            <li>{{ $item['item'] }}</li>
                        @endforeach
                    </ul>
                @endif
            @endforeach
        </div>
    </div>
@endsection
