<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $table = 'kehadiran'; 
    // Your table name
    protected $fillable = ['id_karyawan', 'tanggal', 'waktu_masuk', 'waktu_pulang']; // Yourfillable fields

    // Assuming you have a relationship with the Karyawan model
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'id_karyawan');
    }
}
