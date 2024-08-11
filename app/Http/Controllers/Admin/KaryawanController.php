<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\User;

class KaryawanController extends Controller
{
    public function index()
    {
     
        $karyawan = Karyawan::all();
        return view('admin.karyawan.karyawan', compact('karyawan'));
    }

    public function create()
    {
        $users = User::all(); // Mengambil semua user untuk dropdown
        return view('admin.karyawan.tambah', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|unique:karyawan,nik|digits:16',
            'name' => 'required',
            'alamat' => 'required',
            'jabatan' => 'required',
            'no_hp' => 'required',
            'id_user' => 'required|exists:users,id|unique:karyawan', // Validasi id_user
            'status' => 'required', // Validasi status
        ]);

        Karyawan::create([
            'nik' => $request->nik,
            'name' => $request->name,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'jabatan' => $request->jabatan,
            'status' => $request->status,
            'id_user' => $request->id_user,
        ]);

        return redirect()->route('admin.karyawan')->with('success', 'Karyawan berhasil ditambahkan');
    }
    
    public function edit($id)
    {
        $karyawan = Karyawan::find($id);
        $users = User::all(); // Mengambil semua user untuk dropdown
        return view('admin.karyawan.edit', compact('karyawan', 'users'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'nik' => 'required|unique:karyawan,nik|digits:16',
            'name' => 'required',
            'alamat' => 'required',
            'jabatan' => 'required',
            'no_hp' => 'required',
            'id_user' => 'required|exists:users,id', // Validasi id_user
            'status' => 'required', // Validasi status
        ]);
        $karyawan = Karyawan::find($id);
        $karyawan->update([
            'nik' => $request->nik,
            'name' => $request->name,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'jabatan' => $request->jabatan,
            'status' => $request->status,
            'id_user' => $request->id_user,
        ]);
        return redirect()->route('admin.karyawan')->with('success', 'Karyawan berhasil diupdate');
    }
    
    public function destroy($id)
    {
        Karyawan::find($id)->delete();
        return redirect()->route('admin.karyawan')->with('success', 'Karyawan berhasil dihapus');
    }
}