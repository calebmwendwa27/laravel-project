@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
<header class="bg-gradient-to-r from-blue-100 to-blue-50 shadow-md rounded-b-lg">
  <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold text-gray-900">
      Welcome, <span class="text-blue-700">{{ Auth::user()->name ?? 'Guest' }}</span>.
    </h1>

    @isset($hospital)
      <p class="mt-2 text-lg text-gray-800">
        Please fill in the details below with respect to
        <span class="text-blue-800 font-semibold uppercase tracking-wide">{{ $hospital->facility_name }}</span>
        in
        <span class="text-blue-800 font-semibold uppercase tracking-wide">{{ $hospital->county }}</span> county.
      </p>
    @endisset
  </div>
</header>



    <!-- Main Content -->
    <main>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" x-data="{ step: 1 }">
            <!-- Links Section -->
            <div class="px-4 py-8 sm:px-0 bg-gradient-to-br from-gray-50 to-gray-100 rounded-lg mx-4">
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
                    <!-- Link 1 -->
                    <div class="group text-center">
                        <a href="#" @click.prevent="step = 1" class="inline-block py-2">
                            <span :class="step === 1 ? 'text-blue-600 font-semibold' : 'text-gray-700 group-hover:text-blue-600'" class="text-lg font-medium transition-colors duration-200">FACILITY INFORMATION</span>
                            <div :class="step === 1 ? 'w-4/5 bg-blue-600' : 'w-0 group-hover:w-4/5 bg-blue-600'" class="mt-2 h-1 mx-auto transition-all duration-500 ease-out"></div>
                        </a>
                    </div>

                    <!-- Link 2 -->
                    <div class="group text-center">
                        <a href="#" @click.prevent="step = 2" class="inline-block py-2">
                            <span :class="step === 2 ? 'text-green-600 font-semibold' : 'text-gray-700 group-hover:text-green-600'" class="text-lg font-medium transition-colors duration-200">MANDATORY REQUIREMENTS</span>
                            <div :class="step === 2 ? 'w-4/5 bg-green-600' : 'w-0 group-hover:w-4/5 bg-green-600'" class="mt-2 h-1 mx-auto transition-all duration-500 ease-out"></div>
                        </a>
                    </div>

                    <!-- Link 3 -->
                    <div class="group text-center">
                        <a href="#" @click.prevent="step = 3" class="inline-block py-2">
                            <span :class="step === 3 ? 'text-purple-600 font-semibold' : 'text-gray-700 group-hover:text-purple-600'" class="text-lg font-medium transition-colors duration-200">SERVICES OFFERED</span>
                            <div :class="step === 3 ? 'w-4/5 bg-purple-600' : 'w-0 group-hover:w-4/5 bg-purple-600'" class="mt-2 h-1 mx-auto transition-all duration-500 ease-out"></div>
                        </a>
                    </div>

                    <!-- Link 4 -->
                    <div class="group text-center">
                        <a href="#" @click.prevent="step = 4" class="inline-block py-2">
                            <span :class="step === 4 ? 'text-red-600 font-semibold' : 'text-gray-700 group-hover:text-red-600'" class="text-lg font-medium transition-colors duration-200">FACILITY INFRASTRUCTURE</span>
                            <div :class="step === 4 ? 'w-4/5 bg-red-600' : 'w-0 group-hover:w-4/5 bg-red-600'" class="mt-2 h-1 mx-auto transition-all duration-500 ease-out"></div>
                        </a>
                    </div>

                    <!-- Link 5 -->
                    <div class="group text-center">
                        <a href="#" @click.prevent="step = 5" class="inline-block py-2">
                            <span :class="step === 5 ? 'text-yellow-500 font-semibold' : 'text-gray-700 group-hover:text-yellow-500'" class="text-lg font-medium transition-colors duration-200">PERSONNEL</span>
                            <div :class="step === 5 ? 'w-4/5 bg-yellow-500' : 'w-0 group-hover:w-4/5 bg-yellow-500'" class="mt-2 h-1 mx-auto transition-all duration-500 ease-out"></div>
                        </a>
                    </div>

                    <!-- Link 6 -->
                    <div class="group text-center">
                        <a href="#" @click.prevent="step = 6" class="inline-block py-2">
                            <span :class="step === 6 ? 'text-indigo-600 font-semibold' : 'text-gray-700 group-hover:text-indigo-600'" class="text-lg font-medium transition-colors duration-200">DOCUMENTATION</span>
                            <div :class="step === 6 ? 'w-4/5 bg-indigo-600' : 'w-0 group-hover:w-4/5 bg-indigo-600'" class="mt-2 h-1 mx-auto transition-all duration-500 ease-out"></div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Divider -->
  
          

            <!-- multiform steps -->
              <form method="POST" action="{{ route('facility.store') }}" enctype="multipart/form-data">
               @csrf
             <div>
    
             <div x-show="step === 1" class="bg-white p-6 rounded shadow">
                   
                    <div class="space-y-4">
                       
                            @include('facility')
                        <div class="flex justify-end mt-4">
                            <button type="button" @click="step = 2" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Next</button>
                        </div>
                     
                       
                    </div>
                </div>

                <!-- Step 2 -->
                <div x-show="step === 2" class="bg-white p-6 rounded shadow">
                   
                    <div class="space-y-4">
                      @include('mandatory')
                        <div class="flex justify-between mt-4">
                            <button type="button" @click="step = 1" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition">Back</button>
                            <button type="button" @click="step = 3" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Next</button>
                        </div>
                    </div>
                </div>

                <!-- Step 3 -->
                <div x-show="step === 3" class="bg-white p-6 rounded shadow">
                   
                    <div class="space-y-4">
                        @include('services')
                        <div class="flex justify-between mt-4">
                            <button type="button" @click="step = 2" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition">Back</button>
                            <button type="button" @click="step = 4" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Next</button>
                        </div>
                    </div>
                </div>

                <!-- Step 4 -->
                <div x-show="step === 4" class="bg-white p-6 rounded shadow">
                   
                    <div class="space-y-4">
                      @include('faciltyinfra')
                        <div class="flex justify-between mt-4">
                            <button type="button" @click="step = 3" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition">Back</button>
                            <button type="button" @click="step = 5" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Next</button>
                        </div>
                    </div>
                </div>

                <!-- Step 5 -->
                <div x-show="step === 5" class="bg-white p-6 rounded shadow">
                    <h2 class="text-xl font-bold mb-4">Personnel</h2>
                    <div class="space-y-4">
                      @include('personal')
                        <div class="flex justify-between mt-4">
                            <button type="button"  @click="step = 4" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition">Back</button>
                            <button type="button" @click="step = 6" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Next</button>
                        </div>
                    </div>
                </div>

                <!-- Step 6 -->
                <div x-show="step === 6" class="bg-white p-6 rounded shadow">
                    <h2 class="text-xl font-bold mb-4">Documentation DONE HERE</h2>
                    <div class="space-y-4">
                       2
                        <div class="flex justify-between mt-4">
                            <button @click="step = 5" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition">Back</button>
                            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">Submit</button>
                        </div>
                    </div>
                </div>
                    </div>
                    </form>
            </div>

        </div>
    </main>
</div>
@endsection
