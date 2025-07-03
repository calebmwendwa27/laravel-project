@extends('layouts.app')

@section('title', 'Disease Search Dashboard')

@section('content')

<section class="mainboard">
    <h1>Disease Information Database</h1>
    <p>Search through comprehensive medical information, symptoms, and treatments</p>

    <form method="GET" action="{{ route('dashboard') }}" class="search-box">
        <input 
            type="text" 
            name="query" 
            placeholder="Search diseases, symptoms, or treatments..." 
            id="searchInput" 
            value="{{ $query ?? '' }}"
        >
        <button type="submit" class="search-btn-icon">
           <i class="fas fa-search"></i>
        </button>
    </form>

    <div class="stats">
        <div class="stat-card">
            <h2>10,000+</h2>
            <p>Diseases Cataloged</p>
        </div>
        <div class="stat-card">
            <h2>50,000+</h2>
            <p>Symptoms Tracked</p>
        </div>
        <div class="stat-card">
            <h2>25,000+</h2>
            <p>Treatment Options</p>
        </div>
    </div>
</section>

<div class="filter-bar">
    <h4>Search by disease Category</h4>
    
    <div class="filter-dropdown">
        <button class="filter-btn" type="button" onclick="toggleDropdown()">Select Category</button>
        
        <div id="dropdown-content" class="dropdown-content hidden">
            <div class="category-buttons-scroll">
                <button class="filter-btn {{ ($filter ?? '') == '' ? 'active' : '' }}" onclick="filterCategory('')">All</button>
                @foreach($categories as $category)
                    <button 
                        class="filter-btn {{ ($filter ?? '') == $category ? 'active' : '' }}" 
                        onclick="filterCategory('{{ $category }}')" 
                        data-fulltext="{{ $category }}">
                        {{ $category }}
                    </button>
                @endforeach
            </div>
        </div>
    </div>
</div>

<section class="section">
    @if(isset($diseases) && $diseases->count())
        <h2>Search Results ({{ $diseases->total() }})</h2>

        <div class="disease-cards">
            @foreach($diseases as $disease)
                <div 
                    class="disease-card" 
                    onclick="showDetails(
                        '{{ addslashes($disease->variant_name ?? 'Unnamed Variant') }}',
                        '{{ addslashes($disease->group_desc) }}',
                        '{{ addslashes($disease->variant_desc) }}',
                        '{{ $disease->code }}',
                        '{{ $disease->variant_code }}',
                        '{{ addslashes($disease->category_desc) }}'
                    )"
                    style="cursor: pointer;"
                >
                    <span class="badge {{ strtolower($disease->category_desc) === 'cardiovascular' ? 'high' : 'moderate' }}">
                        {{ $disease->category_desc }}
                    </span>
                    <h3>{{ $disease->variant_name ?? 'Unnamed Variant' }}</h3>
                    <p>{{ $disease->group_desc }}</p>
                    <p>{{ $disease->variant_desc }}</p>
                    <p><strong>Code:</strong> {{ $disease->code }}</p>
                    <p><strong>Variant Code:</strong> {{ $disease->variant_code }}</p>
                </div>
            @endforeach
        </div>

        <div class="pagination-links">
            <p>Showing page {{ $diseases->currentPage() }} of {{ $diseases->lastPage() }} | Total Results: {{ $diseases->total() }}</p>
            <div class="pagination">
                @if ($diseases->onFirstPage())
                    <span>&laquo; Previous</span>
                @else
                    <a href="{{ $diseases->previousPageUrl() }}">&laquo; Previous</a>
                @endif

                @php
                    $start = max(1, $diseases->currentPage() - 2);
                    $end = min($diseases->lastPage(), $diseases->currentPage() + 2);
                @endphp

                @for ($i = $start; $i <= $end; $i++)
                    @if ($i == $diseases->currentPage())
                        <span class="active">{{ $i }}</span>
                    @else
                        <a href="{{ $diseases->url($i) }}">{{ $i }}</a>
                    @endif
                @endfor

                @if ($diseases->hasMorePages())
                    <a href="{{ $diseases->nextPageUrl() }}">Next &raquo;</a>
                @else
                    <span>Next &raquo;</span>
                @endif
            </div>
        </div>

    @elseif(empty($query) && empty($filter))
        <h2>Featured Diseases</h2>
        <div class="disease-cards">
            <div class="disease-card">
                <span class="badge high">Cardiovascular</span>
                <h3>Hypertension</h3>
                <p>Cardiovascular disease causing high blood pressure.</p>
                <p>Affects 45% of adults globally</p>
            </div>
            <div class="disease-card">
                <span class="badge moderate">Respiratory</span>
                <h3>Asthma</h3>
                <p>Respiratory condition with airway inflammation.</p>
                <p>Common in children and adults</p>
            </div>
            <div class="disease-card">
                <span class="badge moderate">Endocrine</span>
                <h3>Type 2 Diabetes</h3>
                <p>Metabolic disorder affecting blood sugar regulation.</p>
                <p>Affects millions worldwide</p>
            </div>
        </div>

    @elseif(isset($apiData) && $apiData)
        <h2>Results from the ICD 11 and 10 API</h2>
        <div class="disease-cards">
            <div class="disease-card">
                <span class="badge moderate">Site results</span>
                <h3>{{ $apiData['title']['@value'] ?? 'No Title' }}</h3>
                <p>{{ $apiData['definition']['@value'] ?? 'No Description Available' }}</p>
                <p><strong>Code:</strong> {{ $apiData['theCode']['code'] ?? 'N/A' }}</p>
            </div>
        </div>
    @else
        <p>No diseases found matching your search.</p>
    @endif
</section>

{{-- MODAL FOR DISEASE DETAILS --}}
<div id="detailsModal" class="modal hidden">
    <div class="modal-content">
        <span class="close-btn" onclick="closeModal()">&times;</span>
        <h2 id="modalTitle"></h2>
        <p><strong>Category:</strong> <span id="modalCategory"></span></p>
        <p><strong>Group:</strong> <span id="modalGroup"></span></p>
        <p><strong>Description:</strong> <span id="modalDesc"></span></p>
        <p><strong>Code:</strong> <span id="modalCode"></span></p>
        <p><strong>Variant Code:</strong> <span id="modalVCode"></span></p>
    </div>
</div>

@endsection
