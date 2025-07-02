<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    protected $table = 'medicine';
    
    protected $fillable= [
        'Name_of_medicine','prescription','medical_status','active_substance','non-proprietar_name','Therapeutic_area(MeSH)','ATC_code'
    ];
protected $hidden=['created_at','updated-at'];
}