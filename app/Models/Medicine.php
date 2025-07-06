<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    protected $table = 'medicine'; // matches your DB table name
    public $timestamps = false;    // only if your table has no created_at/updated_at

    protected $fillable = [
        'name_of_medicine',
        'generic_name',
        'category',
        'symptoms',
        'uses',
        'adult_doses',
        'children_doses',
        'side_effects',
        'warnings',
        'estimated_price',
        'diseases'
    ];
}
