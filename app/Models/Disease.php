<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    protected $table = 'diseases';    
    protected $fillable = [
        'numbering', 'category_desc', 'group_code', 'group_desc',
        'code', 'variant_name', 'variant_code', 'variant_desc'
    ];
    protected $hidden = [
        'created_at', 'updated_at'
    ];
}
