<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class trasnsactions extends Model
{
    use HasFactory;

    // protected $table = 'parkir_transactions';

    protected $fillable = [
        'id_lokasi', 
        'no_tiket', 
        'no_polisi', 
        'id_jenis', 
        'masuk',
        'keluar',
        'perjam_pertama', 
        'perjam_berikutnya', 
        'max_perhari', 
        'total_jam', 
        'total_bayar'
    ];

    public function lokasi()
    {
        return $this->belongsTo(locations::class, 'id_lokasi');
    }

    public function jenisKendaraan()
    {
        return $this->belongsTo(vehicle_types::class, 'id_jenis');
    }
}
