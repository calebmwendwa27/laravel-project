<?php

namespace App\Http\Controllers;

use App\Models\HospitalList;
use Illuminate\Http\Request;

class HospitalRedirectController extends Controller
{
    public function redirect($id){
        $hospital_list=HospitalList::findOrFail($id);
        $searchQuery = urlencode("{$hospital_list->facility_name} KENYA OFFICIAL SITE");
         return redirect()->away("https://www.google.com/search?q={$searchQuery}");
    }
}
