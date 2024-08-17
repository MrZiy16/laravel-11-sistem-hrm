<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanCuti extends Model
{
    use HasFactory;

    protected $table = 'pengajuan_cuti';
    protected $primaryKey = 'id_pengajuan';
    protected $fillable = [
        'id_jenis_cuti',
        'id_karyawan',
        'tanggal',
        'waktu_mulai',
        'waktu_selesai',
    ];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'id_karyawan');
    }

    public function jenisCuti()
    {
        return $this->belongsTo(JenisCuti::class, 'id_jenis_cuti');
    }
    public function Cuti()
    {
        return $this->hasOne(Cuti::class, 'id_pengajuan', 'id_pengajuan');
    }
}