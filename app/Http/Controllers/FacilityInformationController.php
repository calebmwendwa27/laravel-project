<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FacilityInformation;
use App\Models\FacilityInfrastructure;

class FacilityInformationController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validate the FacilityInformation fields
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

        // 2. Store Section A: Facility Information
        $facility = FacilityInformation::create($data);

        // 3. Store Section B: Mandatory Requirements
        $facility->mandatoryRequirement()->create([
            'opd_ae' => $request->mandatory_opd_ae,
            'opd_ae_remarks' => $request->mandatory_opd_ae_remarks,
            'functional_departments' => $request->mandatory_functional_departments,
            'functional_departments_remarks' => $request->mandatory_functional_departments_remarks,
            'inpatient_beds' => $request->mandatory_inpatient_beds,
            'inpatient_beds_remarks' => $request->mandatory_inpatient_beds_remarks,
            'icu_beds' => $request->mandatory_icu_beds,
            'icu_beds_remarks' => $request->mandatory_icu_beds_remarks,
            'hdu_beds' => $request->mandatory_hdu_beds,
            'hdu_beds_remarks' => $request->mandatory_hdu_beds_remarks,
            'theatres' => $request->mandatory_theatres,
            'theatres_remarks' => $request->mandatory_theatres_remarks,
            'radiology' => $request->mandatory_radiology,
            'radiology_remarks' => $request->mandatory_radiology_remarks,
            'specialist_services' => $request->mandatory_specialist_services,
            'specialist_services_remarks' => $request->mandatory_specialist_services_remarks,
            'pharmacy_services' => $request->mandatory_pharmacy_services,
            'pharmacy_services_remarks' => $request->mandatory_pharmacy_services_remarks,
            'cssd' => $request->mandatory_cssd,
            'cssd_remarks' => $request->mandatory_cssd_remarks,
            'burns_unit' => $request->mandatory_burns_unit,
            'burns_unit_remarks' => $request->mandatory_burns_unit_remarks,
            'new_born_unit' => $request->mandatory_new_born_unit,
            'new_born_unit_remarks' => $request->mandatory_new_born_unit_remarks,
        ]);

        // 4. Store Section C: Services Offered
        $servicesData = [];
        for ($i = 1; $i <= 84; $i++) {
            $servicesData["service{$i}"] = $request->input("service{$i}");
            $servicesData["remark{$i}"] = $request->input("remark{$i}");
        }
        $facility->services()->create($servicesData);

        // 5. Store Section D: Facility Infrastructure
        $infrastructureData = $request->only((new FacilityInfrastructure)->getFillable());
        $infrastructureData['facility_information_id'] = $facility->id;
        FacilityInfrastructure::create($infrastructureData);

        $personnelData = [];

$fields = [
    'medical_officers',
    'anaesthesiologists',
    'cardiologists',
    'general_surgeons',
    'orthopaedic_surgeons',
    'cardiothoracic_surgeon',
    'critical_care_specialist',
    'ent_surgeons',
    'physicians',
    'obstetricians_gynaecologists',
    'palliative_care_specialists',
    'nephrologist',
    'plastic_reconstructive_surgeon',
    'neurosurgeons',
    'oncologists',
    'ophthalmologist',
    'dermatologists',
    'paediatricians',
    'pathologists',
    'psychiatrists',
    'radiologists',
    'public_health_specialists',
    'urologists',
    'clinical_officers_general_specialized',
    'clinical_officer_anaesthetist',
    'clinical_officer_lung_skin',
    'clinical_officer_psychiatry',
    'clinical_officer_ophthalmology',
    'clinical_officer_orthopaedic',
    'clinical_officer_dermatology',
    'clinical_officer_oncology',
    'clinical_officer_paediatrics',
    'clinical_officer_reproductive_health',
    'nurses_total',
    'ophthalmic_nurses',
    'paediatric_nurses',
    'palliative_care_nurses',
    'psychiatric_nurses',
    'registered_midwives',
    'theatre_nurses',
    'anaesthetic_nurses',
    'accident_emergency_nurses',
    'oncology_nurses',
    'critical_care_nurses',
    'sign_language_staff',
    'pharmacists',
    'clinical_pharmacists',
    'oncology_pharmacists',
    'pharmaceutical_technologists',
    'orthopaedic_trauma_technologists',
    'orthopaedic_technologists',
    'physiotherapists',
    'speech_therapists',
    'occupational_therapists',
    'dental_officers',
    'oral_maxillofacial_surgeon',
    'paediatric_dentists',
    'orthodontists',
    'dental_technologists',
    'radiographers',
    'sonographers',
    'mammographers',
    'ct_mri_radiographers',
    'dental_radiographers',
    'therapy_radiographers',
    'nuclear_medicine_technologists',
    'radiation_safety_officer',
    'medical_social_workers',
    'laboratory_technologists',
    'remarks_medical_officers',
'remarks_anaesthesiologists',
'remarks_cardiologists',
'remarks_general_surgeons',
'remarks_orthopaedic_surgeons',
'remarks_cardiothoracic_surgeon',
'remarks_critical_care_specialist',
'remarks_ent_surgeons',
'remarks_physicians',
'remarks_obstetricians_gynaecologists',
'remarks_palliative_care_specialists',
'remarks_nephrologist',
'remarks_plastic_reconstructive_surgeon',
'remarks_neurosurgeons',
'remarks_oncologists',
'remarks_ophthalmologist',
'remarks_dermatologists',
'remarks_paediatricians',
'remarks_pathologists',
'remarks_psychiatrists',
'remarks_radiologists',
'remarks_public_health_specialists',
'remarks_urologists',
'remarks_clinical_officers_general_specialized',
'remarks_clinical_officer_anaesthetist',
'remarks_clinical_officer_lung_skin',
'remarks_clinical_officer_psychiatry',
'remarks_clinical_officer_ophthalmology',
'remarks_clinical_officer_orthopaedic',
'remarks_clinical_officer_dermatology',
'remarks_clinical_officer_oncology',
'remarks_clinical_officer_paediatrics',
'remarks_clinical_officer_reproductive_health',
'remarks_nurses_total',
'remarks_ophthalmic_nurses',
'remarks_paediatric_nurses',
'remarks_palliative_care_nurses',
'remarks_psychiatric_nurses',
'remarks_registered_midwives',
'remarks_theatre_nurses',
'remarks_anaesthetic_nurses',
'remarks_accident_emergency_nurses',
'remarks_oncology_nurses',
'remarks_critical_care_nurses',
'remarks_sign_language_staff',
'remarks_pharmacists',
'remarks_clinical_pharmacists',
'remarks_oncology_pharmacists',
'remarks_pharmaceutical_technologists',
'remarks_orthopaedic_trauma_technologists',
'remarks_orthopaedic_technologists',
'remarks_physiotherapists',
'remarks_speech_therapists',
'remarks_occupational_therapists',
'remarks_clinical_psychologists',
'remarks_dental_officers',
'remarks_oral_maxillofacial_surgeon',
'remarks_paediatric_dentists',
'remarks_orthodontists',
'remarks_dental_technologists',
'remarks_radiographers',
'remarks_sonographers',
'remarks_mammographers',
'remarks_ct_mri_radiographers',
'remarks_dental_radiographers',
'remarks_therapy_radiographers',
'remarks_nuclear_medicine_technologists',
'remarks_radiation_safety_officer',
'remarks_medical_social_workers',
'remarks_laboratory_technologists',

];

foreach ($fields as $field) {
    $personnelData[$field] = $request->input($field);
    $personnelData["remarks_{$field}"] = $request->input("remarks_{$field}");
}

$facility->personnelAvailability()->create($personnelData);

        return redirect()->back()->with('success', 'All facility data saved successfully.');
    }
}
