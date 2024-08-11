<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\Cuti;

class CutiController extends Controller
{
    public function index()
    {

        $cuti = Cuti::all();
        return view('admin.absen & cuti.cuti', compact('cuti'));
    }



    public function updateStatus(Request $request, $id_approval)
    {
        $cuti = Cuti::find($id_approval);
        $cuti->update([
            'status' => $request->status, 
            'tanggal_approval' => $request->tanggal_approval ?? now(),
        ]);
        return redirect()->route('admin.absen & cuti.cuti');
    }


} 