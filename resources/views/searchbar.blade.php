@extends('layouts.app')

@section('content')
<style>
    .tab-active {
        background-color: #007BFF;
        color: white;
        font-weight: bold;
    }
    .tab-inactive {
        background-color: white;
        color: #007BFF;
        font-weight: normal;
    }
</style>

{{-- Header --}}
<div class="bg-gradient-to-r from-blue-600 to-blue-500 py-8 text-center text-white shadow-md">
    <h1 class="text-4xl font-bold tracking-wide">MEDIFIND</h1>
    <p class="mt-2 text-lg font-light">Where knowledge meets healing</p>
</div>

{{-- Tabs --}}
<div class="bg-white shadow-sm px-4 py-2 flex justify-center border-b border-gray-200">
    <div class="flex gap-4 w-full max-w-2xl">
        <a href="{{ route('medicine.index') }}"
           class="w-1/2 text-center py-2 rounded-md {{ request()->routeIs('medicine.index') ? 'tab-active' : 'tab-inactive' }}">
            Drug Search
        </a>
        <a href="#"
           class="w-1/2 text-center py-2 rounded-md tab-inactive">
            Common Diseases
        </a>
    </div>
</div>

{{-- Prompt box --}}
<div class="text-center bg-gray-50 p-6 shadow-sm rounded mt-4 mx-4">
    <p class="text-gray-700 mb-4">Don't know what drug to search? Describe how you feel and a drug will be suggested to you</p>
    <form method="GET" action="{{ route('medicine.index') }}">
        <input type="hidden" name="symptom" value="suggest">
        <button class="px-4 py-2 border border-blue-400 text-blue-700 rounded hover:bg-blue-50 flex items-center mx-auto">
            💙 How I Feel - Get Suggestions
        </button>
    </form>
</div>

{{-- Search Form --}}
<div class="bg-white rounded-lg shadow-md p-6 mx-4 mt-6">
    <h2 class="text-blue-700 text-lg font-semibold mb-2 flex items-center">
        🔍 Search Drugs
    </h2>
    <p class="text-gray-600 text-sm mb-4">Search by drug name, category, or condition. Use voice search or type manually.</p>

    {{-- Search Bar with Icons --}}
    <div class="flex gap-2">
        <input type="text" name="query" id="searchInput"
               value="{{ request('query') }}"
               class="flex-grow border border-gray-300 rounded-md px-4 py-2 text-sm"
               placeholder="Enter drug name, condition, or speak..." />
        <button type="button" id="speakBtn"
                class="bg-blue-100 hover:bg-blue-200 text-blue-700 px-3 py-2 rounded">
            🎤
        </button>
        <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
            🔍 Search
        </button>
    </div>
</form>
</div>

{{-- Results --}}
@if(!empty($results) && count($results) > 0)
    <div class="mt-8 px-4 space-y-6">
        @foreach($results as $med)
            <div class="bg-white rounded-lg shadow-md p-6 border border-blue-100">
                <h2 class="text-2xl font-semibold text-blue-800 flex items-center">
                    🔗 {{ $med->name_of_medicine }}
                </h2>
                @if($med->generic_name)
                    <p class="text-sm text-gray-600 mt-1">Generic: {{ $med->generic_name }}</p>
                @endif
                @if($med->category)
                    <div class="mt-2 text-sm text-blue-700">
                        <span class="font-semibold">Category:</span>
                        <span class="inline-block bg-blue-100 text-blue-700 rounded-full px-3 py-1">
                            {{ $med->category }}
                        </span>
                    </div>
                @endif

                <div class="mt-4">
                    <h3 class="font-semibold text-blue-700">Used For:</h3>
                    <p class="text-gray-800">{{ $med->uses }}</p>
                </div>

                <div class="mt-4 grid md:grid-cols-2 gap-4">
                    <div class="bg-blue-50 rounded p-4">
                        <h4 class="font-semibold text-blue-700 text-sm mb-1">💖 Adult Dosage:</h4>
                        <p class="text-gray-700 text-sm">{{ $med->adult_doses }}</p>
                    </div>
                    <div class="bg-pink-50 rounded p-4">
                        <h4 class="font-semibold text-pink-700 text-sm mb-1">💗 Children's Dosage:</h4>
                        <p class="text-gray-700 text-sm">{{ $med->children_doses }}</p>
                    </div>
                </div>

                <div class="mt-4">
                    <h4 class="font-semibold text-gray-800 text-sm">Side Effects:</h4>
                    <p class="text-sm text-gray-700">{{ $med->side_effects }}</p>
                </div>

                <div class="mt-4">
                    <h4 class="font-semibold text-red-600 text-sm">⚠️ Warnings & Precautions:</h4>
                    <p class="text-sm text-gray-700">{{ $med->warnings }}</p>
                </div>

                <div class="mt-4 border-t pt-2">
                    <p class="text-sm font-medium text-gray-700">Estimated Price:</p>
                    <span class="text-green-700 font-semibold text-sm bg-green-100 px-2 py-1 rounded inline-block mt-1">
                        {{ $med->estimated_price }}
                    </span>
                </div>
            </div>
        @endforeach
    </div>
@else
    <p class="text-center text-gray-500 mt-6">No results found.</p>
@endif

{{-- JS for Voice Search --}}
<script>
document.getElementById('speakBtn').addEventListener('click', function () {
    const recognition = new (window.SpeechRecognition || window.webkitSpeechRecognition)();
    recognition.lang = 'en-US';
    recognition.start();

    recognition.onresult = function (event) {
        const transcript = event.results[0][0].transcript;
        document.getElementById('searchInput').value = transcript;
    };
});
</script>
@endsection
