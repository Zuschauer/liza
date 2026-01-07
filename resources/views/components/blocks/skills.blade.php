@props(['data' => [], 'company' => null])

@php
    $skills = $data['skills'] ?? [];
@endphp

<section class="w-full bg-gray-50 py-12">
    <div class="container mx-auto px-4">
        @if(!empty($data['heading']))
            <h2 class="text-2xl md:text-3xl font-bold mb-6 text-center">
                {{ $data['heading'] }}
            </h2>
        @endif

        @if(!empty($data['description']))
            <p class="text-gray-600 mb-8 text-center max-w-2xl mx-auto">
                {{ $data['description'] }}
            </p>
        @endif

        @if(!empty($skills) && count($skills) > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 max-w-5xl mx-auto">
                @foreach($skills as $skill)
                    @php
                        $color = $skill['color'] ?? '#3b82f6';
                        $level = $skill['level'] ?? 50;
                    @endphp
                    <div class="bg-white rounded-lg shadow p-6">
                        <div class="flex justify-between items-center mb-3">
                            <span class="font-semibold text-gray-800">
                                {{ $skill['name'] ?? 'Unbekannt' }}
                            </span>
                            <span class="text-sm font-medium" style="color: {{ $color }}">
                                {{ $level }}%
                            </span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2.5">
                            <div
                                class="h-2.5 rounded-full transition-all duration-300"
                                style="width: {{ $level }}%; background-color: {{ $color }};"
                            ></div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-center text-gray-500">
                Keine Skills hinzugefügt.
            </p>
        @endif
    </div>
</section>
