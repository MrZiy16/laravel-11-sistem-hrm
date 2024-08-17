<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Cuti extends Model
{
    use HasFactory;

    protected $table = 'approval_cuti';
    protected $primaryKey = 'id_approval';
    protected $fillable = [
        'id_pengajuan',
        'id_approver',
        'updated_at',
        'status',
    ];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'id_approver');
    }

    public function pengajuanCuti()
    {
        return $this->belongsTo(PengajuanCuti::class, 'id_pengajuan');
    }
   

}