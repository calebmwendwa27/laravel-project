<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServicesOffered extends Model
{
    use HasFactory;

    protected $fillable = [
        'facility_id',
        // Mass assign all 84 service and remark fields
        ...collect(range(1, 84))->flatMap(function ($i) {
            return ["service{$i}", "remark{$i}"];
        })->toArray()
    ];
     public function facility()
    {
        return $this->belongsTo(FacilityInformation::class);
    }
}
