<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;
    protected $table = 'karyawan';
    protected $fillable = [
        'id_user','name', 'nik', 'alamat', 'no_hp', 'jabatan', 'status',
    ];
    public function user()
{
    return $this->belongsTo(User::class, 'id_user');
}
}
    