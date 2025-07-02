@extends('layouts.app')

@section('title', 'Dashboard')

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

        <select name="filter" class="filter-dropdown">
            <option value="">All Categories</option>
            @foreach($categories as $category)
                <option value="{{ $category }}" {{ ($filter ?? '') == $category ? 'selected' : '' }}>
                    {{ $category }}
                </option>
            @endforeach
        </select>

        <button type="submit">
            <img src="https://cdn-icons-png.flaticon.com/512/622/622669.png" alt="Search">
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

<section class="details">
    <div class="carddetails">
        <h3>85,430</h3>
        <p>Total Records<br><small>+12% this month</small></p>
    </div>
    <div class="carddetails">
        <h3>98.7%</h3>
        <p>Search Accuracy<br><small>Improved matching</small></p>
    </div>
    <div class="carddetails">
        <h3>2 hours ago</h3>
        <p>Last Updated<br><small>Real-time sync</small></p>
    </div>
    <div class="carddetails">
        <h3>1,200+</h3>
        <p>Verified Sources<br><small>Medical professionals</small></p>
    </div>
</section>

<section class="section">

    @if(isset($diseases) && count($diseases))
        <h2>Search Results ({{ count($diseases) }})</h2>

        <div class="disease-cards">
            @foreach($diseases as $disease)
                <div class="disease-card">
                    <span class="badge 
                        {{ strtolower($disease->category_desc) === 'cardiovascular' ? 'high' : 'moderate' }}">
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

    @elseif(empty($query) && empty($filter))
        <h2>Featured Diseases</h2>
        <div class="disease-cards">
            <div class="disease-card">
                <span class="badge high">Cardiovascular</span>
                <h3>Hypertension</h3>
                <p>Cardiovascular disease causing high blood pressure.</p>
                <p> Affects 45% of adults globally</p>
            </div>
            <div class="disease-card">
                <span class="badge moderate">Respiratory</span>
                <h3>Asthma</h3>
                <p>Respiratory condition with airway inflammation.</p>
                <p> Common in children and adults</p>
            </div>
            <div class="disease-card">
                <span class="badge moderate">Endocrine</span>
                <h3>Type 2 Diabetes</h3>
                <p>Metabolic disorder affecting blood sugar regulation.</p>
                <p> Affects millions worldwide</p>
            </div>
        </div>

        <div class="browse-category">
            <div class="category-item"><br>Cardiovascular</div>
            <div class="category-item"><br>Respiratory</div>
            <div class="category-item"><br>Neurological</div>
            <div class="category-item"><br>Endocrine</div>
        </div>

    @else
        <p>No diseases found matching your search.</p>
    @endif

</section>

@endsection