@extends('layouts.app', ['hide_navigation' => true])

@section('content')
<div class="bg-white min-h-screen">
   
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

  

  
    <div class="container mx-auto px-4 py-6 from-blue-100 to-white">
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
                        <tr class="hover:bg-gray-50 transition">
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
            </div>
        @elseif(isset($query))
            <p class="mt-6 text-red-600">No hospitals found matching <strong>"{{ $query }}"</strong>.</p>
        @else
            <p class="mt-6 text-gray-500 text-center">Enter search terms to find hospitals</p>
        @endif
    </div>
</div>


@endsection