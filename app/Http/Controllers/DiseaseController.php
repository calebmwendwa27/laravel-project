<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disease;

class DiseaseController extends Controller
{
//public function hybridSearch(Request $request)//






    public function index(Request $request)
{
    $query = $request->input('query') ?? '';
    $filter = $request->input('filter') ?? '';

    $diseases = Disease::query();

    if ($query) {
        $diseases->where(function ($q) use ($query) {
            $q->where('variant_name', 'like', "%$query%")
              ->orWhere('group_code', 'like', "%$query%")
              ->orWhere('group_desc', 'like', "%$query%")
              ->orWhere('code', 'like', "%$query%")
              ->orWhere('variant_code', 'like', "%$query%")
              ->orWhere('variant_desc', 'like', "%$query%");
        });
    }

    if ($filter) {
        $diseases->where('group_desc', $filter);
    }

    $diseases = $diseases->get();

  
    $categories = Disease::select('group_desc')
                         ->whereNotNull('group_desc')
                         ->where('group_desc', '!=', '')
                         ->distinct()
                         ->orderBy('group_desc')
                         ->pluck('group_desc');

    return view('dashboard', [
        'diseases' => $diseases,
        'query' => $query,
        'filter' => $filter,
        'categories' => $categories
    ]);
}
}
