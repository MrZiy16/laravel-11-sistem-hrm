<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\JenisCuti;
use App\Models\PengajuanCuti;

class CutiiController extends Controller
{
    public function index()
    {
        $cuti = PengajuanCuti::all();
        
        return view('user.cuti', compact('cuti'));
    }
    public function create()
    {
        $karyawan = Karyawan::all();
        $jenisCuti = JenisCuti::all();
        return view('user.formcuti', compact('karyawan', 'jenisCuti'));
    }

    public function store(Request $request)
    {

        $request -> validate([
            'id_karyawan' => 'required',
            'id_jenis_cuti' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',

        ]);
    PengajuanCuti::create($request->all());
        return redirect()->route('user.cuti');

        // Tambahkan redirect atau response sesuai kebutuhan
    }
}