{{-- SEARCH BAR --}}
<div id="search" class="bg-gray-100 py-12 px-4 text-center">
    <h2 class="text-2xl font-semibold text-gray-700 mb-4">Search for any drug or disease</h2>
    <form method="GET" action="{{ route('search') }}" class="max-w-2xl mx-auto flex gap-4">
        <input type="text" name="query" placeholder="Enter medicine name or condition"
            class="w-full px-4 py-2 rounded border border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-400"
            required>
        <button type="submit"
            class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-red-600 transition">Search</button>
    </form>
</div>