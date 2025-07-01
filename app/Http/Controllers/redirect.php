<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Models\HospitalList

class redirect extends Controller
{
public function hospital_redirect(HospitalList $hospital_list){
 $searchQuery = urlencode("{$hospital->name} Kenya official site");
        return redirect()->away("https:www.google.com/search?q={$searchQuery}");
}
}
