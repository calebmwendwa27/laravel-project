<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MandatoryRequirement extends Model
{
  protected $fillable = [
    'facility_information_id',
    'opd_ae',
    'functional_departments',
    'inpatient_beds',
    'icu_beds',
    'hdu_beds',
    'theatres',
    'radiology',
    'specialist_services',
    'pharmacy_services',
    'cssd',
    'burns_unit',
    'new_born_unit',
];
//reverse relationship with FacilityInformation//
public function facility()
{
    return $this->belongsTo(FacilityInformation::class, 'facility_information_id');
}
}
