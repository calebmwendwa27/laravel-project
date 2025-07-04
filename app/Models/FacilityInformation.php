<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FacilityInformation extends Model
{
    protected $table = 'facility_information';

    protected $fillable = [
        'registration_name',
        'master_facility_no',
        'registration_no',
        'physical_location',
        'contact_person_name',
        'qualification_of_contact_person',
        'county',
        'sub_county',
        'address',
        'town',
        'code',
        'building_plot_no',
        'phone',
        'email',
        'facility_level',
        'facility_ownership',
        'catchment_population',
        'monthly_outpatient_workload',
        'inpatient_bed_capacity',
        'location_description',
        'facility_level_description'
    ];
    //relationship with MandatoryRequirement//
    public function mandatoryRequirement()
{
    return $this->hasOne(MandatoryRequirement::class);
}

}
