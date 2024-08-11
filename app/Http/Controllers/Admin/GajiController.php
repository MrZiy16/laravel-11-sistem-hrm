<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\Gaji;

class GajiController extends Controller
{
    public function index()
    {   
        $gaji = Gaji::all();
        return view('admin.gaji.gaji', compact('gaji'));
    }
    public function create()
    {
        $gaji = Karyawan::select('id', 'name')->get();
        return view('admin.gaji.tambah', compact('gaji'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_karyawan' => 'required|exists:karyawan,id',
            'jabatan' => 'required',
            'jumlah_gaji' => 'required|numeric',
        ]);
        Gaji::create([
            'id_karyawan' => $request->id_karyawan,
            'jabatan' => $request->jabatan,
            'jumlah_gaji' => $request->jumlah_gaji
        ]);

        return redirect()->route('admin.gaji.gaji')->with('success', 'Data Gaji Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $gaji = Gaji::findOrFail($id);
        $karyawan = Karyawan::all();
        return view('admin.gaji.edit', compact('gaji', 'karyawan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_karyawan' => 'required',
            'jabatan' => 'required',
            'jumlah_gaji' => 'required|numeric',
        ]);
        $gaji = Gaji::findOrFail($id);
        $gaji->update([
            'id_karyawan' => $request->id_karyawan,
            'jabatan' => $request->jabatan,
            'jumlah_gaji' => $request->jumlah_gaji
        ]);

        return redirect()->route('admin.gaji.gaji')->with('success', 'Data Gaji Berhasil Diubah');
    }

    public function destroy($id)
    {
        $gaji = Gaji::findOrFail($id);
        $gaji->delete();

        return redirect()->route('admin.gaji.gaji')->with('success', 'Data Gaji Berhasil Dihapus');
    }

}