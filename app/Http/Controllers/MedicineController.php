<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicine;

class MedicineController extends Controller
{
      public function index(Request $request)
         {
            $query = $request->input('query');
            $medicine= [];
            if($query){
            $medicine = Medicine::where('name_of_medicine', 'like', "%$query%")
               ->orWhere('prescription', 'like', "%$query%")
               ->orWhere('medical_status', 'like', "%$query%")
               ->orWhere('active_substance', 'like', "%$query%")
               ->orWhere('non-proprietar_name', 'like', "%$query%")
               ->orWhere('ATC_code', 'like', "%$query%")
               ->orwhere('Therapeutic_area(MeSH)','like',"%$query%")
               ->get();}

               return view('dashboard', compact('medicine', 'query'));
         }

}