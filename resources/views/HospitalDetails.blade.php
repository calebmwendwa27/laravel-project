@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <header class="bg-gradient-to-r from-blue-100 to-blue-50 shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900">
                Welcome, {{ Auth::user()->name ?? 'Guest' }}.
            </h1>

            @isset($hospital)
                <p class="mt-2 text-lg text-gray-700">
                    Please fill in the details below with respect to <span class="font-semibold">{{ $hospital->facility_name }}</span>
                    in <span class="font-semibold">{{ $hospital->county }}</span> county.
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
                    <!-- Repeat for each link -->
                    @php
                        $tabs = [
                            1 => ['label' => 'FACILITY INFORMATION', 'color' => 'blue'],
                            2 => ['label' => 'MANDATORY REQUIREMENTS', 'color' => 'green'],
                            3 => ['label' => 'SERVICES OFFERED', 'color' => 'purple'],
                            4 => ['label' => 'FACILITY INFRASTRUCTURE', 'color' => 'red'],
                            5 => ['label' => 'PERSONNEL', 'color' => 'yellow'],
                            6 => ['label' => 'DOCUMENTATION', 'color' => 'indigo'],
                        ];
                    @endphp

                    @foreach($tabs as $index => $tab)
                        <div class="group text-center">
                            <a href="#" @click.prevent="step = {{ $index }}" class="inline-block py-2">
                                <span 
                                    class="text-lg font-medium transition-colors duration-200"
                                    :class="step === {{ $index }} ? 'text-{{ $tab['color'] }}-600 font-semibold' : 'text-gray-700 group-hover:text-{{ $tab['color'] }}-600'">
                                    {{ $tab['label'] }}
                                </span>
                                <div 
                                    class="mt-2 h-1 mx-auto transition-all duration-500 ease-out"
                                    :class="step === {{ $index }} ? 'w-4/5 bg-{{ $tab['color'] }}-600' : 'w-0 group-hover:w-4/5 bg-{{ $tab['color'] }}-600'">
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Divider -->
            <div class="border-t border-gray-200 my-6 mx-4"></div>

            <!-- Multi-Step Form Section -->
            <div class="px-4 py-6 sm:px-0">
                <!-- Step 1 -->
                <div x-show="step === 1" class="bg-white p-6 rounded shadow">
                    <h2 class="text-xl font-bold mb-4">Facility Information</h2>
                    <div class="space-y-4">
                        <input type="text" placeholder="Facility Name" class="w-full border p-2 rounded" />
                        <input type="text" placeholder="Registration Number" class="w-full border p-2 rounded" />
                        <input type="text" placeholder="Facility Level" class="w-full border p-2 rounded" />
                        <div class="flex justify-end mt-4">
                            <button @click="step = 2" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Next</button>
                        </div>
                    </div>
                </div>

                <!-- Step 2 -->
                <div x-show="step === 2" class="bg-white p-6 rounded shadow">
                    <h2 class="text-xl font-bold mb-4">Mandatory Requirements</h2>
                    <div class="space-y-4">
                        <input type="text" placeholder="License Number" class="w-full border p-2 rounded" />
                        <input type="date" placeholder="Expiry Date" class="w-full border p-2 rounded" />
                        <div class="flex justify-between mt-4">
                            <button @click="step = 1" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition">Back</button>
                            <button @click="step = 3" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Next</button>
                        </div>
                    </div>
                </div>

                <!-- Step 3 -->
                <div x-show="step === 3" class="bg-white p-6 rounded shadow">
                    <h2 class="text-xl font-bold mb-4">Services Offered</h2>
                    <div class="space-y-4">
                        <textarea placeholder="List services offered..." class="w-full border p-2 rounded"></textarea>
                        <div class="flex justify-between mt-4">
                            <button @click="step = 2" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition">Back</button>
                            <button @click="step = 4" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Next</button>
                        </div>
                    </div>
                </div>

                <!-- Step 4 -->
                <div x-show="step === 4" class="bg-white p-6 rounded shadow">
                    <h2 class="text-xl font-bold mb-4">Facility Infrastructure</h2>
                    <div class="space-y-4">
                        <input type="text" placeholder="Building Type" class="w-full border p-2 rounded" />
                        <input type="text" placeholder="No. of Rooms" class="w-full border p-2 rounded" />
                        <div class="flex justify-between mt-4">
                            <button @click="step = 3" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition">Back</button>
                            <button @click="step = 5" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Next</button>
                        </div>
                    </div>
                </div>

                <!-- Step 5 -->
                <div x-show="step === 5" class="bg-white p-6 rounded shadow">
                    <h2 class="text-xl font-bold mb-4">Personnel</h2>
                    <div class="space-y-4">
                        <input type="text" placeholder="No. of Doctors" class="w-full border p-2 rounded" />
                        <input type="text" placeholder="No. of Nurses" class="w-full border p-2 rounded" />
                        <div class="flex justify-between mt-4">
                            <button @click="step = 4" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition">Back</button>
                            <button @click="step = 6" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Next</button>
                        </div>
                    </div>
                </div>

                <!-- Step 6 -->
                <div x-show="step === 6" class="bg-white p-6 rounded shadow">
                    <h2 class="text-xl font-bold mb-4">Documentation</h2>
                    <div class="space-y-4">
                        <input type="file" class="w-full border p-2 rounded" />
                        <textarea placeholder="Additional Notes..." class="w-full border p-2 rounded"></textarea>
                        <div class="flex justify-between mt-4">
                            <button @click="step = 5" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition">Back</button>
                            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">Submit</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
</div>
@endsection
