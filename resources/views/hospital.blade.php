@extends('layouts.app', ['hide_navigation' => true])

@section('content')
<div class="bg-white  bg-cover bg-center min-h-screen " style="background-image: url('/images/hospital1.jpg')">
   
    <div class="bg-blue-600 shadow-md px-5 py-4">
        
        <div class="text-blue-100 text-xs mb-1">
            <a href="{{ 'dashboard' }}" class="hover:underline">Home</a> :: Search for a Registered Health Institution
        </div>
        
        
        <h1 class="text-xl font-medium mb-4 text-white">Discover Registered Medical Facilities</h1>
        
      
        <div class=" rounded-lg shadow-sm p-4 mt-2">
            
            <form method="GET" action="{{ route('hospital') }}">
                <div class="flex items-center ">
                    <input 
                        type="text"
                        id="queryInput"
                        name="query"
                        value="{{ $query ?? '' }}"
                        placeholder="Search by name, registration number or level..."
                        class="flex-grow px-4 py-2 border rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent "
                        oninput="showSuggestions(this.value)"
                        autocomplete="off"
                    >
                    <button 
                        type="submit"
                        class="ml-2 bg-BLUE hover:bg-blue-700 text-white px-6 py-2 rounded-full transition-colors"
                    >
                        Search
                    </button>
                </div>
                <ul id="suggestions" class="mt-2 bg-black border rounded shadow hidden"></ul>
            </form>
        </div>
    </div>

  


    <div class="container mx-auto px-4 py-6 from-blue-100 to-white ">
        {{-- Search Results --}}
        @if(isset($hospital_list) && count($hospital_list))
            <h3 class="text-xl font-semibold mb-4 text-gray-700">
                Matching Facilities: <span class="text-blue-600">"{{ $query }}"</span> 
                <span class="text-sm text-gray-500">({{ count($hospital_list) }} found)</span>
            </h3>

            <div class="overflow-x-auto shadow-md rounded-lg">
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Reg No.</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Facility Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">County</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Level</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Agent</th>
                        </tr>
                    </thead>
                   <tbody class="divide-y divide-gray-200">
  @foreach($hospital_list as $hospital)
    <tr onclick="window.location='{{ route('details', $hospital->id) }}'" 
        class="hover:bg-gray-50 cursor-pointer transition">
        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $hospital->reg_number }}</td>
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $hospital->facility_name }}</td>
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $hospital->county }}</td>
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $hospital->facility_type }}</td>
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $hospital->level }}</td>
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $hospital->facility_agent }}</td>
    </tr>
@endforeach

</tbody>

                </table>
            {{-- pagination of the returned results --}}
@if ($hospital_list->lastPage() > 1)
    <div class="flex justify-center mt-6">
        <nav class="inline-flex items-center border border-gray-300 rounded-md px-4 py-2">
            {{-- Previous Button --}}
            @if ($hospital_list->onFirstPage())
                <span class="text-gray-400 mr-2">← Previous</span>
            @else
                <a href="{{ $hospital_list->appends(request()->query())->previousPageUrl() }}"
                   class="text-white hover:underline mr-2">← Previous</a>
            @endif

            {{-- Page Numbers --}}
            @php
                $start = max(1, $hospital_list->currentPage() - 2);
                $end = min($hospital_list->lastPage(), $hospital_list->currentPage() + 2);
            @endphp

            @if ($start > 1)
                <a href="{{ $hospital_list->url(1) }}"
                   class="mx-1 text-sm text-gray-700 hover:text-blue-600 {{ $hospital_list->currentPage() == 1 ? 'font-bold underline text-blue-600' : '' }}">
                   1
                </a>
                <span class="mx-1 text-gray-500">...</span>
            @endif

            @for ($i = $start; $i <= $end; $i++)
                <a href="{{ $hospital_list->appends(request()->query())->url($i) }}"
                   class="mx-1 text-sm px-2 py-1 border-b-2 {{ $hospital_list->currentPage() == $i ? 'border-blue-500 text-blue-600 font-bold' : 'border-transparent text-gray-700 hover:border-gray-400' }}">
                    {{ $i }}
                </a>
            @endfor

            @if ($end < $hospital_list->lastPage())
                <span class="mx-1 text-gray-500">...</span>
                <a href="{{ $hospital_list->url($hospital_list->lastPage()) }}"
                   class="mx-1 text-sm text-gray-700 hover:text-blue-600">
                   {{ $hospital_list->lastPage() }}
                </a>
            @endif

            {{-- Next Button --}}
            @if ($hospital_list->hasMorePages())
                <a href="{{ $hospital_list->appends(request()->query())->nextPageUrl() }}"
                   class="text-white hover:underline ml-2">Next →</a>
            @else
                <span class="text-gray-400 ml-2">Next →</span>
            @endif
        </nav>
    </div>
@endif

 


            </div>
        @elseif(isset($query))
            <p class="mt-6 text-red-600">No hospitals found matching <strong>"{{ $query }}"</strong>.</p>
        @else
            <p class="mt-6 text-gray-500 text-center">Enter search terms to find hospitals</p>
        @endif
    </div>
</div>


@endsection