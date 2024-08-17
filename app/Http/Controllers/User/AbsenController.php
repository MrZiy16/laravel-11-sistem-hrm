<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\Karyawan;
use Carbon\Carbon;

class AbsenController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $karyawan = Karyawan::where('id_user', $user->id)->first();

        if (!$karyawan) {
            return redirect()->back()->with('error', 'Data karyawan tidak ditemukan');
        }

        $absensi = Absensi::where('id_karyawan', $karyawan->id)
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('user.absensi', compact('absensi'));
    }

    public function absen(Request $request)
    {
        $user = auth()->user();
        $now = Carbon::now();
        $karyawan = Karyawan::where('id_user', $user->id)->first();

        if (!$karyawan) {
            return redirect()->back()->with('error', 'Data karyawan tidak ditemukan');
        }
        if (Absensi::where('id_karyawan', $karyawan->id)
            ->whereDate('tanggal', $now->format('Y-m-d'))
            ->exists()) {
            return redirect()->back()->with('error', 'Silahkan Update Absen Terlebih Dahulu');
        }
        $absensi = Absensi::where('id_karyawan', $karyawan->id)
        ->whereDate('tanggal', $now->format('Y-m-d'))
        ->first();
        Absensi::create([
            'id_karyawan' => $karyawan->id,
            'tanggal' => $now->format('Y-m-d'),
            'waktu_masuk' => $now->format('H:i:s')
        ]);
        return redirect()->back()->with('successs', 'Absensi masuk berhasil');
    }


    public function updateAbsen(Request $request)
    {
        $user = auth()->user();
        $now = Carbon::now();
        $karyawan = Karyawan::where('id_user', $user->id)->first();
  

        if (!$karyawan) {
            return redirect()->back()->with('error', 'Data karyawan tidak ditemukan');
        }
        $absensi = Absensi::where('id_karyawan', $karyawan->id)
            ->whereDate('tanggal', $now->format('Y-m-d'))
            ->first();
 if($absensi->waktu_pulang != null){
    return redirect()->back()->with('error', 'Absen sudah dilakukan');
 }
         
    Absensi::where('id_karyawan', $karyawan->id)
        ->whereDate('tanggal', $now->format('Y-m-d'))
        ->update([
            'waktu_pulang' => $now->format('H:i:s')
        ]);
        return redirect()->back()->with('success', 'Absensi keluar berhasil');
    }
}
