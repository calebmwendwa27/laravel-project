<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    
    <title>@yield("title") | Global Disease Search</title>
    
</head>
<body>

<header></header>

@yield('content')

<footer></footer>

<style>

body {
    margin: 0;
    font-family: Arial, sans-serif;
    background: #f4f7fa;
    color: #333;
}

.mainboard {
    background: #2563eb;
    color: #fff;
    padding: 60px 20px;
    text-align: center;
}

.mainboard h1 {
    font-size: 40px;
    margin-bottom: 10px;
}

.mainboard p {
    font-size: 18px;
    margin-bottom: 30px;
}

.search-box {
    display: flex;
    justify-content: center;
    margin-bottom: 16px;
    flex-wrap: wrap;
    gap: 10px;
    position: relative;
    align-items: center;
}

.search-box input {
    width: 50%;
    padding: 12px 20px;
    border-radius: 8px;
    border: 1px solid;
    font-size: 16px;
    outline: none;
    max-width: 500px;
}

.search-btn-icon {
    background: #fff;
    border: 2px solid #2563eb;
    color: #2563eb;
    border-radius: 8px;
    padding: 10px 16px;
    cursor: pointer;
    font-size: 16px;
    transition: background 0.3s, color 0.3s;
}

.search-btn-icon:hover {
    background: #2563eb;
    color: #fff;
}

.search-btn-icon i {
    font-size: 16px;
}

.filter-btn {
    padding: 12px 20px;
    border-radius: 8px;
    background: #fff;
    color: #2563eb;
    border: 2px solid #2563eb;
    font-size: 16px;
    cursor: pointer;
    transition: background 0.3s, color 0.3s;
    text-decoration: none;
    display: inline-block;
}

.filter-btn:hover.active{
    background: #2563eb;
    color: #fff;
}

.stats {
    display: flex;
    justify-content: center;
    gap: 20px;
    flex-wrap: wrap;
    margin-top: 20px;
}

.stat-card {
    background: rgba(255, 255, 255, 0.15);
    padding: 20px 30px;
    border-radius: 12px;
    min-width: 150px;
    backdrop-filter: blur(4px);
    color: #fff;
    text-align: center;
}

.stat-card h2 {
    margin: 0;
    font-size: 24px;
}

.stat-card p {
    margin: 5px 0 0;
    color: #dbeafe;
}

.filter-bar {
    background: #fff;
    padding: 20px;
    margin: 30px auto;
    max-width: 800px;
    text-align: center;
    border-radius: 12px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
}

.category-buttons {
    display: flex;
    justify-content: center;
    gap: 10px;
    flex-wrap: wrap;
    margin-top: 15px;
}

.details {
    display: flex;
    justify-content: center;
    gap: 30px;
    padding: 30px 20px;
    flex-wrap: wrap;
    background: #fff;
    box-shadow: 0 4px 8px rgba(0,0,0,0.05);
    margin-top: 20px;
}

.carddetails {
    background: #fff;
    padding: 20px;
    border-radius: 12px;
    text-align: center;
    min-width: 180px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
}

.carddetails h3 {
    font-size: 28px;
    margin: 0 0 10px;
    color: #2563eb;
}

.carddetails p {
    margin: 0;
    font-size: 14px;
    color: #666;
}

.section {
    padding: 40px 20px;
}

.section h2 {
    font-size: 24px;
    margin-bottom: 20px;
    text-align: center;
}

.disease-cards {
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
    justify-content: center;
}

.disease-card {
    background: #fff;
    border: 2px solid #cbd5e1;
    border-radius: 12px;
    padding: 20px;
    padding-top: 60px;
    width: 300px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.05);
    position: relative;
    overflow: hidden;
}
.disease-card .badge {
    position: absolute;
    top: 15px;
    left: 15px;
    padding: 6px 12px;
    border-radius: 6px;
    font-size: 11px;
    color: #fff;
    max-width: 90%;
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
}

.badge.moderate {
    background: #fbbf24;
    color: #333;
}

.badge.high {
    background: #ef4444;
}

.disease-card h3 {
    margin: 10px 0;
    font-size: 20px;
}

.disease-card p {
    font-size: 14px;
    margin: 8px 0;
    color: #555;
}

.details-btn {
    display: block;
    margin-top: 15px;
    text-align: center;
    padding: 8px 0;
    border: 1px solid #2563eb;
    border-radius: 6px;
    background: #2563eb;
    color: #fff;
    text-decoration: none;
    transition: background 0.3s;
}

.details-btn:hover {
    background: #1e40af;
}

@media (max-width: 768px) {
    .search-box {
        flex-direction: column;
        align-items: center;
    }

    .search-box input {
        width: 80%;
    }

    .filter-btn {
        width: 80%;
    }

    .stats, .details {
        flex-direction: column;
        align-items: center;
    }

    .disease-card {
        width: 90%;
    }
}

.category-scroll {
    overflow-x: auto;
    padding: 10px 0;
    margin: 0 auto;
    max-width: 800px;
}

.category-buttons-scroll {
    display: flex;
    gap: 10px;
    min-width: max-content;
}

.category-scroll::-webkit-scrollbar {
    height: 6px;
}

.category-scroll::-webkit-scrollbar-thumb {
    background: #cbd5e1;
    border-radius: 3px;
}

.category-scroll::-webkit-scrollbar-track {
    background: #f1f5f9;
}

.pagination-links {
    margin-top: 20px;
    text-align: center;
}

.pagination-links .pagination {
    display: inline-flex;
    gap: 6px;
}

.pagination-links .pagination a,
.pagination-links .pagination span {
    padding: 6px 12px;
    border: 1px solid #cbd5e1;
    border-radius: 6px;
    background: #fff;
    color: #333;
    text-decoration: none;
}

.pagination-links .pagination .active {
    background: #2563eb;
    color: #fff;
    font-weight: bold;
}

.filter-dropdown {
    width: 100%;
    max-width: auto;
    margin: 15px auto 0;
    text-align: center;
}

#dropdown-content {
    background-color: #fff;
    max-height: 270px;
    overflow-y: auto;
    border: 1px solid #cbd5e1;
    border-radius: 8px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    padding: 15px;
    margin-top: 15px;
    display: none;
}

.category-buttons-scroll {
    display: flex;
    flex-direction: column;
    gap: 10px;
    align-items: center;
}

#dropdown-content::-webkit-scrollbar {
    width: 6px;
}

#dropdown-content::-webkit-scrollbar-thumb {
    background: #cbd5e1;
    border-radius: 3px;
}

#dropdown-content::-webkit-scrollbar-track {
    background: #f1f5f9;
}
.suggestions-list {
    position: absolute;
    top: 100%;
    left: 0;
    width: 100%;
    max-height: 200px;
    overflow-y: auto;
    background: #fff;
    border: 1px solid #cbd5e1;
    border-radius: 8px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    z-index: 10;
    list-style: none;
    padding: 0;
    margin: 5px 0 0;
}

.suggestions-list li {
    padding: 10px;
    cursor: pointer;
    transition: background 0.3s;
}

.suggestions-list li:hover {
    background: #f1f5f9;
}

.modal {
    display: flex;
    justify-content: center;
    align-items: center;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0,0,0,0.6);
}

.modal.hidden {
    display: none;
}

.modal-content {
    background-color: #fff;
    padding: 30px;
    border-radius: 12px;
    max-width: 500px;
    width: 90%;
    box-shadow: 0 4px 8px rgba(0,0,0,0.3);
    position: relative;
}

.close-btn {
    position: absolute;
    top: 15px;
    right: 20px;
    font-size: 28px;
    font-weight: bold;
    color: #333;
    cursor: pointer;
}


</style>

<script>
function showSuggestions(keyword) {
    const list = document.getElementById('suggestions');
    if (keyword.length < 2) {
        list.classList.add('hidden');
        list.innerHTML = '';
        return;
    }

    fetch(`/api/disease-suggestions?q=${keyword}`)
        .then(res => res.json())
        .then(data => {
            list.innerHTML = '';
            if (data.length) {
                list.classList.remove('hidden');
                data.forEach(item => {
                    const li = document.createElement('li');
                    li.classList = 'px-4 py-2 hover:bg-gray-100 cursor-pointer';
                    li.innerText = `${item.variant_name ?? item.variant_code}`;
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

function toggleDescription(container) {
    const desc = container.querySelector('.description-content');
    const button = container.querySelector('button');

    desc.classList.toggle('line-clamp-4');
    container.classList.toggle('max-h-24');

    const isClamped = desc.classList.contains('line-clamp-4');
    button.textContent = isClamped ? 'Show more' : 'Show less';
}

function filterCategory(category) {
    const url = new URL(window.location.href);
    url.searchParams.set('filter', category);
    window.location.href = url.toString();
}

function toggleDropdown() {
    const dropdown = document.getElementById('dropdown-content');
    dropdown.style.display = (dropdown.style.display === 'block') ? 'none' : 'block';
}

// Optional: Close dropdown if clicking outside
document.addEventListener('click', function(event) {
    const dropdown = document.getElementById('dropdown-content');
    const button = document.querySelector('.filter-dropdown button');

    if (!dropdown.contains(event.target) && !button.contains(event.target)) {
        dropdown.style.display = 'none';
    }
});

// ---------------- MODAL LOGIC ----------------

function showDetails(title, group, desc, code, vcode, category) {
    document.getElementById('modalTitle').innerText = title;
    document.getElementById('modalGroup').innerText = group;
    document.getElementById('modalDesc').innerText = desc;
    document.getElementById('modalCode').innerText = code;
    document.getElementById('modalVCode').innerText = vcode;
    document.getElementById('modalCategory').innerText = category;
    
    document.getElementById('detailsModal').classList.remove('hidden');
}

function closeModal() {
    document.getElementById('detailsModal').classList.add('hidden');
}
</script>


</body>
</html>
