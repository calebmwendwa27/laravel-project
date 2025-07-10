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
    <div class="mt-2 w-16 h-1 bg-white/30 mx-auto rounded-full"></div>
</div>

{{-- Search Section (above tabs) --}}
<div class="bg-white rounded-lg shadow-md p-6 mx-4 mt-6 max-w-7xl mx-auto">

    <form method="GET" action="{{ route('medicine.index') }}">
        {{-- Main Search Bar --}}
        <div class="flex items-center gap-2 mb-4">
            <input type="text" name="query" id="searchInput"
                value="{{ request('query') }}"
                class="flex-grow border border-gray-300 rounded-md px-4 py-2 text-sm"
                placeholder="🔍 Search for drugs, conditions, or symptoms..." />

            <button type="button" id="speakBtn"
                class="bg-blue-100 hover:bg-blue-200 text-blue-700 px-3 py-2 rounded">
                🎤
            </button>

            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                Search
            </button>
        </div>

        {{-- Filter + Suggestion --}}
        <div class="flex flex-col md:flex-row md:items-center gap-4">
            <select name="category" class="w-full md:w-1/3 border border-gray-300 rounded-md px-3 py-2 text-sm">
                <option value="">Filter by category</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat }}" {{ request('category') == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                @endforeach
            </select>

            <button type="button"
                class="w-full md:w-auto border border-blue-400 text-blue-700 px-4 py-2 rounded hover:bg-blue-50 flex items-center justify-center"
                onclick="document.getElementById('howFeelModal').showModal()">
                💙 How I Feel - Get Suggestions
            </button>
        </div>
    </form>
</div>

{{-- Tabs --}}
<div class="bg-white shadow-sm px-4 py-2 border-b border-gray-200 mx-4 mt-4 rounded-lg max-w-7xl mx-auto">
    <div class="flex gap-4 w-full">
        <button onclick="showPane('search')" class="w-1/2 text-center py-2 rounded-md tab-button tab-active" id="search-tab">
            Drug Search
        </button>
        <button onclick="showPane('common')" class="w-1/2 text-center py-2 rounded-md tab-button tab-inactive" id="common-tab">
            Common Diseases
        </button>
    </div>
</div>


{{-- Search Pane --}}
<div id="search-pane">
    @if(!empty($results) && count($results) > 0)
        <div class="mt-8 px-6 space-y-6 max-w-7xl mx-auto">

            <h2 class="text-2xl font-semibold text-blue-800 mb-4">Search Results ({{ count($results) }})</h2>
            @foreach($results as $med)
                <div class="bg-white rounded-lg shadow-md p-6 border border-blue-100">
                    <h2 class="text-2xl font-semibold text-blue-800 flex items-center">
                        🔗 {{ $med->name_of_medicine }}
                    </h2>
                    @if($med->generic_name)
                        <p class="text-sm text-gray-600 mt-1">Generic: {{ $med->generic_name }}</p>
                    @endif
                    @if($med->category)
                        <div class="mt-2 text-sm">
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
</div>

{{-- Common Diseases Pane --}}
<div id="common-pane" class="hidden px-4 mt-6 max-w-6xl mx-auto">
    <h2 class="text-2xl font-semibold text-blue-800 mb-6">🩺 Common Diseases & Their Medicines</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @php
            $commonDiseases = [
                ['name' => 'Headache', 'medicines' => ['Paracetamol', 'Ibuprofen', 'Aspirin']],
                ['name' => 'Fever', 'medicines' => ['Paracetamol', 'Ibuprofen', 'Aspirin']],
                ['name' => 'Bacterial Infection', 'medicines' => ['Amoxicillin', 'Azithromycin', 'Cephalexin']],
                ['name' => 'Allergy', 'medicines' => ['Cetirizine', 'Loratadine', 'Diphenhydramine']],
                ['name' => 'Acid Reflux (GERD)', 'medicines' => ['Omeprazole', 'Ranitidine', 'Antacids']],
                ['name' => 'Stomach Ulcers', 'medicines' => ['Omeprazole', 'Lansoprazole', 'Amoxicillin']],
                ['name' => 'Gastritis', 'medicines' => ['Antacids', 'Omeprazole', 'Sucralfate']],
                ['name' => 'Diarrhea', 'medicines' => ['Loperamide', 'Oral Rehydration Salts', 'Probiotics']],
                ['name' => 'Constipation', 'medicines' => ['Docusate', 'Bisacodyl', 'Fiber Supplements']],
                ['name' => 'Nausea & Vomiting', 'medicines' => ['Ondansetron', 'Metoclopramide', 'Ginger Supplements']],
                ['name' => 'Stomach Cramps', 'medicines' => ['Buscopan', 'Paracetamol', 'Antispasmodics']],
                ['name' => 'Indigestion', 'medicines' => ['Antacids', 'Simethicone', 'Digestive Enzymes']],
            ];
        @endphp

        @foreach($commonDiseases as $disease)
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-lg font-semibold text-blue-700 mb-2">🛡️ {{ $disease['name'] }}</h3>

                <p class="text-sm font-medium text-gray-800 mb-1">Common Medicines:</p>
                <div class="flex flex-wrap gap-2">
                    @foreach($disease['medicines'] as $medicine)
                        <form method="GET" action="{{ route('medicine.index') }}">
                            <input type="hidden" name="query" value="{{ $medicine }}">
                            <button type="submit" class="px-3 py-1 text-sm bg-blue-100 text-blue-700 rounded-full hover:bg-blue-200">
                                {{ $medicine }}
                            </button>
                        </form>
                    @endforeach
                </div>

                <p class="text-xs text-gray-500 mt-3">⚠️ Always consult a healthcare professional before taking any medication.</p>
            </div>
        @endforeach
    </div>
</div>

{{-- How I Feel Modal --}}
<dialog id="howFeelModal" class="rounded-lg shadow-lg p-6 w-full max-w-lg mx-auto">
    <form method="GET" action="{{ route('medicine.index') }}">
        <h2 class="text-lg font-semibold text-blue-600 mb-2">💙 Describe How You Feel</h2>
        <p class="text-sm text-gray-600 mb-4">Tell us about your symptoms and we'll suggest appropriate medications</p>
        <textarea name="symptom" rows="4" class="w-full border border-gray-300 rounded-md p-3 text-sm mb-4" placeholder="Describe your symptoms... (e.g., I have a headache and fever, feeling body aches)"></textarea>
        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
            💙 Get Drug Suggestions
        </button>
    </form>
</dialog>

{{-- JavaScript --}}
<script>
function showPane(pane) {
    const search = document.getElementById('search-pane');
    const common = document.getElementById('common-pane');
    const searchTab = document.getElementById('search-tab');
    const commonTab = document.getElementById('common-tab');

    if (pane === 'search') {
        search.classList.remove('hidden');
        common.classList.add('hidden');
        searchTab.classList.add('tab-active');
        searchTab.classList.remove('tab-inactive');
        commonTab.classList.remove('tab-active');
        commonTab.classList.add('tab-inactive');
    } else {
        search.classList.add('hidden');
        common.classList.remove('hidden');
        searchTab.classList.remove('tab-active');
        searchTab.classList.add('tab-inactive');
        commonTab.classList.add('tab-active');
        commonTab.classList.remove('tab-inactive');
    }
}

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
