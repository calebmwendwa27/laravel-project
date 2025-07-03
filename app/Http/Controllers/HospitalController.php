<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HospitalList;

class HospitalController extends Controller
{
   public function search(Request $request)
   {  $query = $request->input('query');
      $hospital_list=[];
      if ($query) { 
       $hospital_list=HospitalList::where ('facility_name','like',"%$query%")
       ->orWhere('county','LIKE', "%$query%")
       ->orWhere('level','LIKE', "%$query%")
       ->orWhere('facility_type','LIKE', "%$query%")
       ->orWhere('reg_number','LIKE', "%$query%")
       ->orWhere('facility_agent','LIKE', "%$query%")
       
        ->paginate(10);}
     

   return view ('hospital', compact('hospital_list','query'));



}

public function show($id)
{
    $hospital = HospitalList::findOrFail($id);
    return view('HospitalDetails', compact('hospital'));
}


}