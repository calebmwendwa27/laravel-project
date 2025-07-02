@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-10 px-4">
    <img src="{{ asset('dashboard.png') }}" alt="Dashboard Image" class="w-full max-w-md mx-auto rounded shadow " />


    <h2 class="text-3xl font-bold mb-6 text-gray-800"> MEDIFIND</h2>

    {{-- Search Form --}}
    <form method="GET" action="{{ route('dashboard') }}" class="mb-6">
        <div class="flex flex-col sm:flex-row items-center gap-4">
            <input
                type="text"
                id="queryInput"
                name="query"
                value="{{ $query ?? '' }}"
                placeholder="medicine name,atc code,active substance"
                class="w-full sm:w-1/2 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400"
                oninput="showSuggestions(this.value)"
                autocomplete="on"
            >
            <button
                type="submit"
                class="px-6 py-2 bg-blue-400 text-white rounded-lg hover:bg-red-700 transition"
            >
                🔍 Search
            </button>
        </div>
        <ul id="suggestions" class="mt-2 bg-white border rounded shadow hidden"></ul>
    </form>

    {{-- Search Results --}}
    @if(isset($medicine) && count($medicine))
        <h3 class="text-xl font-semibold mb-4 text-gray-700">Results for: <span class="text-blue-600">"{{ $query }}"</span></h3>

        @php $grouped = $medicine->groupBy('group_code'); @endphp

        @foreach($grouped as $groupCode => $groupmedicine)
            <div class="mb-6">
                <h4 class="text-lg font-bold text-gray-800 mb-2">Group: {{ $groupCode }} - {{ $groupmedicine->first()->group_desc }}</h4>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($groupmedicine as $medicine)
                        <div class="bg-white p-5 rounded-xl shadow-md border hover:shadow-lg transition">
                            <div class="flex items-center justify-between mb-2">
                                <h5 class="text-xl font-bold text-blue-700">
                                    {{ $medicine->name_of_medicine ?? 'no suchname' }}
                                </h5>
                                <span class="text-sm bg-blue-100 text-blue-800 px-2 py-1 rounded">
                                     {{ $medicine->code }}
                                </span>
                            </div>
                            <p class="text-sm text-gray-600"><strong>medical_status:</strong> {{ $medicine->medical_status }}</p>
                            <p class="text-sm text-gray-600"><strong>active_susbstance:</strong> {{ $medicine->active_substance }}</p>
<p class="text-sm text-gray-600"><strong>prescription:</strong> {{ $medicine->prescription}}</p>
<p class="text-sm text-gray-600"><strong>ATC_CODE:</strong> {{ $medicine->ATC_code}}</p>

                            <div class="text-sm text-gray-600 whitespace-pre-line break-words mt-2">
                                
                                <div class="overflow-hidden transition-all duration-300 max-h-24 relative" onclick="toggleDescription(this)">
                                    <div class="line-clamp-4 description-content">
                                        {{ $medicine->variant_desc }}
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
   
    @endif
</div>

<script>
    function showSuggestions(keyword) {
        const list = document.getElementById('suggestions');
        if (keyword.length < 2) {
            list.classList.add('hidden');
            list.innerHTML = '';
            return;
        }

        fetch(`/api/medicine-suggestions?q=${encodeURIComponent(keyword)}`)

            .then(res => res.json())
            .then(data => {
                list.innerHTML = '';
                if (data.length) {
                    list.classList.remove('hidden');
                    data.forEach(item => {
                        const li = document.createElement('li');
                        li.classList = 'px-4 py-2 hover:bg-gray-100 cursor-pointer';
                        li.innerText = item.variant_name ?? item.variant_code;
                        li.onclick = () => {
                            document.getElementById('queryInput').value = item.variant_code;
                            list.classList.add('hidden');
                            document.querySelector('form').submit();
                        };
                        list.appendChild(li);
                    });
                } else {
                    list.classList.add('hidden');
                }
            });
    }

    
</script>
@endsection
