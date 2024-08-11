<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\Absensi;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class AbsensiController extends Controller
{
    public function index()
    {
        $absensi = Absensi::all();
        return view('admin.absen & cuti.absensi', compact('absensi'));
    }

    public function laporanBulanan(Request $request)
    {
        $bulan = $request->input('bulan', date('m'));
        $tahun = $request->input('tahun', date('Y'));

        $awalBulan = Carbon::create($tahun, $bulan, 1)->startOfMonth();
        $akhirBulan = Carbon::create($tahun, $bulan, 1)->endOfMonth();

        $totalHariKerja = 0;
        $period = CarbonPeriod::create($awalBulan, $akhirBulan);

        foreach ($period as $date) {
            if ($date->isWeekday() && !$date->isSaturday() && !$date->isSunday()) {
                $totalHariKerja++;
            }
        }

        $absensi = Absensi::whereBetween('tanggal', [$awalBulan, $akhirBulan])
            ->get()
            ->groupBy('id_karyawan');

        $laporanKaryawan = [];

        foreach ($absensi as $idKaryawan => $absensiKaryawan) {
            $jumlahKehadiran = $absensiKaryawan->count();
            $karyawan = Karyawan::find($idKaryawan);

            $laporanKaryawan[] = [
                'id_karyawan' => $idKaryawan,
                'nama_karyawan' => $karyawan ? $karyawan->name : 'Unknown',
                'jumlah_kehadiran' => $jumlahKehadiran,
                'jumlah_ketidakhadiran' => $totalHariKerja - $jumlahKehadiran,
                'persentase_kehadiran' => ($jumlahKehadiran / $totalHariKerja) * 100
            ];
        }

        $laporan = [
            'bulan' => $awalBulan->format('F Y'),
            'total_hari_kerja' => $totalHariKerja,
            'laporan_karyawan' => $laporanKaryawan
        ];

        return view('admin.absen & cuti.laporanHbulanan', compact('laporan'));
    }
}