<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class vehicle_types extends Model
{
    protected $fillable = [
        'jenis',
        'perjam_pertama',
        'perjam_berikutnya',
        'max_perhari',
        
    ];

}
