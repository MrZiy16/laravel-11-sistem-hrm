<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $table = 'kehadiran';
    public $timestamps = false;
    protected $primaryKey = 'id_kehadiran';
    
    protected $fillable = ['id_karyawan', 'tanggal', 'waktu_masuk', 'waktu_pulang'];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'id_karyawan');
    }
}