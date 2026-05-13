
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KepalaSekolahController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\TahunPelajaranController;
use App\Http\Controllers\HariLiburController;
use App\Http\Controllers\AbsensiController;

/*
|--------------------------------------------------------------------------
| WELCOME
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return redirect('/login');
});

/*
|--------------------------------------------------------------------------
| DASHBOARD ADMIN
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

/*
|--------------------------------------------------------------------------
| DASHBOARD GURU
|--------------------------------------------------------------------------
*/
Route::get('/guru/dashboard', [DashboardController::class, 'guru'])
    ->middleware('auth')
    ->name('guru.dashboard');

/*
|--------------------------------------------------------------------------
| AUTH + PROFILE (BREEZE + CUSTOM AVATAR)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    // PROFILE BREEZE
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    // UPLOAD AVATAR
    Route::post('/profile/upload', [ProfileController::class, 'upload'])
        ->name('profile.upload');
});

/*
|--------------------------------------------------------------------------
| GURU
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    Route::get('/guru', [GuruController::class, 'index'])->name('guru.index');
    Route::get('/guru/create', [GuruController::class, 'create'])->name('guru.create');
    Route::post('/guru/store', [GuruController::class, 'store'])->name('guru.store');
    Route::get('/guru/{id}/edit', [GuruController::class, 'edit'])->name('guru.edit');
    Route::put('/guru/{id}', [GuruController::class, 'update'])->name('guru.update');
    Route::delete('/guru/{id}', [GuruController::class, 'destroy'])->name('guru.destroy');

});

/*
|--------------------------------------------------------------------------
| KEPALA SEKOLAH
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    Route::get('/kepala', [KepalaSekolahController::class, 'index'])->name('kepala.index');
    Route::get('/kepala/create', [KepalaSekolahController::class, 'create'])->name('kepala.create');
    Route::post('/kepala/store', [KepalaSekolahController::class, 'store'])->name('kepala.store');
    Route::get('/kepala/{id}/edit', [KepalaSekolahController::class, 'edit'])->name('kepala.edit');
    Route::put('/kepala/{id}', [KepalaSekolahController::class, 'update'])->name('kepala.update');
    Route::delete('/kepala/{id}', [KepalaSekolahController::class, 'destroy'])->name('kepala.destroy');

});

/*
|--------------------------------------------------------------------------
| SEKOLAH
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    Route::get('/sekolah', [SekolahController::class, 'index'])->name('sekolah.index');
    Route::get('/sekolah/create', [SekolahController::class, 'create'])->name('sekolah.create');
    Route::post('/sekolah/store', [SekolahController::class, 'store'])->name('sekolah.store');
    Route::get('/sekolah/{id}/edit', [SekolahController::class, 'edit'])->name('sekolah.edit');
    Route::put('/sekolah/{id}', [SekolahController::class, 'update'])->name('sekolah.update');
    Route::delete('/sekolah/{id}', [SekolahController::class, 'destroy'])->name('sekolah.destroy');

});

/*
|--------------------------------------------------------------------------
| TAHUN PELAJARAN
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    Route::get('/tahun-pelajaran', [TahunPelajaranController::class, 'index'])->name('tahun.index');
    Route::get('/tahun-pelajaran/create', [TahunPelajaranController::class, 'create'])->name('tahun.create');
    Route::post('/tahun-pelajaran/store', [TahunPelajaranController::class, 'store'])->name('tahun.store');
    Route::get('/tahun-pelajaran/{id}/edit', [TahunPelajaranController::class, 'edit'])->name('tahun.edit');
    Route::put('/tahun-pelajaran/{id}', [TahunPelajaranController::class, 'update'])->name('tahun.update');
    Route::delete('/tahun-pelajaran/{id}', [TahunPelajaranController::class, 'destroy'])->name('tahun.destroy');

});

/*
|--------------------------------------------------------------------------
| HARI LIBUR
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    Route::get('/hari-libur', [HariLiburController::class, 'index'])->name('libur.index');
    Route::get('/hari-libur/create', [HariLiburController::class, 'create'])->name('libur.create');
    Route::post('/hari-libur/store', [HariLiburController::class, 'store'])->name('libur.store');
    Route::get('/hari-libur/{id}/edit', [HariLiburController::class, 'edit'])->name('libur.edit');
    Route::put('/hari-libur/{id}', [HariLiburController::class, 'update'])->name('libur.update');
    Route::delete('/hari-libur/{id}', [HariLiburController::class, 'destroy'])->name('libur.destroy');

});

/*
|--------------------------------------------------------------------------
| ABSENSI ADMIN
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    Route::get('/absensi', [AbsensiController::class, 'index'])->name('absensi.index');
    Route::get('/absensi/create', [AbsensiController::class, 'create'])->name('absensi.create');
    Route::post('/absensi/store', [AbsensiController::class, 'store'])->name('absensi.store');
    Route::get('/absensi/{id}/edit', [AbsensiController::class, 'edit'])->name('absensi.edit');
    Route::put('/absensi/{id}', [AbsensiController::class, 'update'])->name('absensi.update');
    Route::delete('/absensi/{id}', [AbsensiController::class, 'destroy'])->name('absensi.destroy');

    // REKAP
    Route::get('/rekap-absensi', [AbsensiController::class, 'rekap'])->name('absensi.rekap');
    Route::get('/rekap-absensi/pdf', [AbsensiController::class, 'pdf'])->name('absensi.pdf');

    // ABSEN GURU MASUK / PULANG
    Route::post('/absensi/masuk', [AbsensiController::class, 'masuk'])->name('absensi.masuk');
    Route::post('/absensi/pulang', [AbsensiController::class, 'pulang'])->name('absensi.pulang');
});

Route::get('/kalender-absensi', [AbsensiController::class, 'kalender'])
    ->middleware('auth')
    ->name('absensi.kalender');

/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';