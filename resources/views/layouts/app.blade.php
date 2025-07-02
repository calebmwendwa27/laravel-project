<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
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
    font-size: 36px;
    margin-bottom: 10px;
}

.mainboard p {
    font-size: 18px;
    margin-bottom: 30px;
}

.search-box {
    display: flex;
    justify-content: center;
    margin-bottom: 40px;
    position: relative;
    flex-wrap: wrap;
    gap: 10px;
}

.search-box input {
    width: 50%;
    padding: 12px 20px;
    border-radius: 8px;
    border: none;
    font-size: 16px;
    outline: none;
    max-width: 500px;
}

.filter-dropdown {
    padding: 12px 20px;
    border-radius: 8px;
    border: none;
    font-size: 16px;
    min-width: 150px;
    max-width: 100%;
}

.search-box button {
    position: absolute;
    right: 26%;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    cursor: pointer;
}

.search-box button img {
    width: 20px;
    height: 20px;
}

.stats {
    display: flex;
    justify-content: center;
    gap: 20px;
    flex-wrap: wrap;
}

.stat-card {
    background: rgba(255, 255, 255, 0.15);
    padding: 20px 30px;
    border-radius: 12px;
    min-width: 150px;
    backdrop-filter: blur(4px);
}

.stat-card h2 {
    margin: 0;
    font-size: 24px;
    color: #fff;
}

.stat-card p {
    margin: 5px 0 0;
    color: #dbeafe;
}

.details {
    display: flex;
    justify-content: center;
    gap: 30px;
    padding: 30px 20px;
    flex-wrap: wrap;
    background: #fff;
    box-shadow: 0 4px 8px rgba(0,0,0,0.05);
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
    background: #fbbf24;
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
    margin: 0;
    font-size: 20px;
}

.disease-card p {
    font-size: 14px;
    margin: 10px 0;
}

.tags {
    display: flex;
    gap: 6px;
    flex-wrap: wrap;
}

.tag {
    background: #e0e7ff;
    padding: 4px 8px;
    border-radius: 6px;
    font-size: 12px;
}

.details-btn {
    display: block;
    margin-top: 15px;
    text-align: center;
    padding: 8px 0;
    border: 1px solid #cbd5e1;
    border-radius: 6px;
    background: #f8fafc;
    cursor: pointer;
    text-decoration: none;
    color: #333;
}

.browse-category {
    display: flex;
    justify-content: center;
    gap: 40px;
    flex-wrap: wrap;
    background: #fff;
    padding: 20px;
    margin-top: 30px;
    border-radius: 12px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
}

.category-item {
    text-align: center;
    color: #333;
}

.category-item img {
    width: 30px;
    margin-bottom: 8px;
}

@media (max-width: 768px) {
    .search-box {
        flex-direction: column;
        align-items: center;
    }

    .search-box input {
        width: 80%;
    }

    .filter-dropdown {
        width: 80%;
        margin: 10px 0 0;
    }

    .search-box button {
        right: 11%;
    }
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
</script>

</body>
</html>
