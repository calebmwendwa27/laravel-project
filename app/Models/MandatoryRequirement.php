<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MandatoryRequirement extends Model
{
  protected $fillable = [
   'facility_information_id',
        'opd_ae',
        'opd_ae_remarks',
        'functional_departments',
        'functional_departments_remarks',
        'inpatient_beds',
        'inpatient_beds_remarks',
        'icu_beds',
        'icu_beds_remarks',
        'hdu_beds',
        'hdu_beds_remarks',
        'theatres',
        'theatres_remarks',
        'radiology',
        'radiology_remarks',
        'specialist_services',
        'specialist_services_remarks',
        'pharmacy_services',
        'pharmacy_services_remarks',
        'cssd',
        'cssd_remarks',
        'burns_unit',
        'burns_unit_remarks',
        'new_born_unit',
        'new_born_unit_remarks',
];
//reverse relationship with FacilityInformation//
public function facility()
{
    return $this->belongsTo(FacilityInformation::class, 'facility_information_id');
}
}
