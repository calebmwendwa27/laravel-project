<?php

namespace App\Http\Controllers;

use App\Services\ICD\ICD_API_Client;
use Illuminate\Http\Request;
use App\Models\Disease;

class DiseaseController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query') ?? '';
        $filter = $request->input('filter') ?? '';

        $diseasesQuery = Disease::query();

        if ($query) {
            $diseasesQuery->where(function ($q) use ($query) {
                $q->where('variant_name', 'like', "%$query%")
                  ->orWhere('group_code', 'like', "%$query%")
                  ->orWhere('group_desc', 'like', "%$query%")
                  ->orWhere('code', 'like', "%$query%")
                  ->orWhere('variant_code', 'like', "%$query%")
                  ->orWhere('variant_desc', 'like', "%$query%");
            });
        }

        if ($filter) {
            $diseasesQuery->where('group_desc', $filter);
        }

        $diseases = $diseasesQuery->paginate(10)->withQueryString();

        $apiData = null;

        // If no local results and a query exists, fetch from ICD API
        if ($diseases->total() === 0 && $query) {
            $baseUrl = config('services.icd.api_url');
            $uri = $baseUrl . "/entity/" . urlencode($query);

            $client = new ICD_API_Client($uri);
            $apiData = $client->get();
        }


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
            'categories' => $categories,
            'apiData' => $apiData
        ]);
    }
}
