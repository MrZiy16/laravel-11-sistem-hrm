<?php
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\KaryawanController;
use App\Http\Controllers\Admin\AbsensiController;
use App\Http\Controllers\Admin\CutiController;
use App\Http\Controllers\Admin\GajiController;
use App\Http\Controllers\User\AbsenController;
use App\Http\Controllers\User\CutiiController;




Route::get('/', function () {
    return view('auth.login');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'otheruser'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('admin/dashboard',[App\Http\Controllers\AdminController::class, 'index'])->middleware(['auth', 'admin'])->name('admin.dashboard');
    Route::get('admin/karyawan',[App\Http\Controllers\Admin\KaryawanController::class, 'index'])->middleware(['auth', 'admin'])->name('admin.karyawan');
    Route::get('admin/karyawan/tambah',[App\Http\Controllers\Admin\KaryawanController::class, 'create'])->middleware(['auth', 'admin'])->name('admin.karyawan.create');
    Route::post('admin/karyawan',[App\Http\Controllers\Admin\KaryawanController::class,'store'])->middleware(['auth', 'admin'])->name('admin.karyawan.store');
    Route::get('admin/karyawan/{id}/edit',[App\Http\Controllers\Admin\KaryawanController::class, 'edit'])->middleware(['auth', 'admin'])->name('admin.karyawan.edit');
    Route::put('admin/karyawan/{id}',[App\Http\Controllers\Admin\KaryawanController::class, 'update'])->middleware(['auth', 'admin'])->name('admin.karyawan.update');
    Route::delete('admin/karyawan/{id}',[App\Http\Controllers\Admin\KaryawanController::class, 'destroy'])->middleware(['auth', 'admin'])->name('admin.karyawan.destroy');
    Route::get('admin/karyawan/absensi',[App\Http\Controllers\Admin\AbsensiController::class, 'index'])->middleware(['auth', 'admin'])->name('admin.absen & cuti.absensi');
    Route::get('admin/karyawan/cuti',[App\Http\Controllers\Admin\CutiController::class, 'index'])->middleware(['auth', 'admin'])->name('admin.absen & cuti.cuti');
    Route::put('/admin/absen-cuti/cuti/{id_approval}', [CutiController::class, 'updateStatus'])
    ->name('admin.absen & cuti.cuti.updateStatus');
    Route::get('/admin/absensi/laporan-bulanan', [AbsensiController::class, 'laporanBulanan'])->name('admin.absensi.laporanHbulanan');
    Route::get('/admin/karyawan/gaji', [GajiController::class, 'index'])->name('admin.gaji.gaji');
    Route::get('/admin/karyawan/gaji/tambah', [GajiController::class, 'create'])->name('admin.gaji.gaji.create');
    Route::post('/admin/karyawan/gaji/store', [GajiController::class, 'store'])->middleware(['auth', 'admin'])->name('admin.gaji.store');
    Route::get('/admin/karyawan/gaji/{id}/edit', [GajiController::class, 'edit'])->name('admin.gaji.edit');
    Route::put('/admin/karyawan/gaji/{id}', [GajiController::class, 'update'])->name('admin.gaji.update');
    Route::delete('/admin/karyawan/gaji/{id}', [GajiController::class, 'destroy'])->name('admin.gaji.destroy');
    
    Route::get('/absen', [AbsenController::class, 'index'])->name('absen');
    Route::post('/absen', [AbsenController::class, 'absen'])
    ->middleware(['auth', 'otheruser'])->name('absen');
    Route::post('/absen/updateabsen', [AbsenController::class, 'updateAbsen'])
    ->middleware(['auth', 'otheruser'])->name('updateAbsen');

    Route::get('/cuti', [App\Http\Controllers\User\CutiiController::class, 'index'])->name('user.cuti');

    Route::get('/formcuti', [App\Http\Controllers\User\CutiiController::class, 'create'])->name('user.formcuti');
    Route::post('/formcuti/tambah', [App\Http\Controllers\User\CutiiController::class,'store'])->name('formcuti.store');
    
    
 

});



require __DIR__.'/auth.php';