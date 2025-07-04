<?php

namespace App\Http\Controllers;
use App\Models\FacilityInformation;

use Illuminate\Http\Request;

class FacilityInformationController extends Controller
{
   public function store(Request $request)
{
    $data = $request->validate([
        'registration_name' => 'nullable|string',
        'master_facility_no' => 'nullable|string',
        'registration_no' => 'nullable|string',
        'physical_location' => 'nullable|string',
        'contact_person_name' => 'nullable|string',
        'qualification_of_contact_person' => 'nullable|string',
        'county' => 'nullable|string',
        'sub_county' => 'nullable|string',
        'address' => 'nullable|string',
        'town' => 'nullable|string',
        'code' => 'nullable|string',
        'building_plot_no' => 'nullable|string',
        'phone' => 'nullable|string',
        'email' => 'nullable|email',
        'facility_level' => 'nullable|string',
        'facility_ownership' => 'nullable|string',
        'catchment_population' => 'nullable|integer',
        'monthly_outpatient_workload' => 'nullable|integer',
        'inpatient_bed_capacity' => 'nullable|integer',
        'location_description' => 'nullable|string',
        'facility_level_description' => 'nullable|string',
    ]); 
     // 2. Create Facility (Section A)
     $facility = FacilityInformation::create($data);
 
   // 3. Create Mandatory Requirements (Section B)
    $facility->mandatoryRequirement()->create([
        'opd_ae' => $request->mandatory_opd_ae,
        'functional_departments' => $request->mandatory_functional_departments,
        'inpatient_beds' => $request->mandatory_inpatient_beds,
        'icu_beds' => $request->mandatory_icu_beds,
        'hdu_beds' => $request->mandatory_hdu_beds,
        'theatres' => $request->mandatory_theatres,
        'radiology' => $request->mandatory_radiology,
        'specialist_services' => $request->mandatory_specialist_services,
        'pharmacy_services' => $request->mandatory_pharmacy_services,
        'cssd' => $request->mandatory_cssd,
        'burns_unit' => $request->mandatory_burns_unit,
        'new_born_unit' => $request->mandatory_new_born_unit,
    ]);
    FacilityInformation::create($data);

   return redirect()->back()->with('success', 'Facility data and mandatory requirements saved successfully.');
}
}
