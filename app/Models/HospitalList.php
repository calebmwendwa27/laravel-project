<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HospitalList extends Model
{
    protected $table = 'hospital_list';
    
    protected $fillable= [
        'reg_number','facilty_name','county','facilty_type','facility_agent','level'
    ];
        
    }
