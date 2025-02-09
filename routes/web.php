<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminSesiController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CitizenController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\KecamatanController;

// Default Route
Route::get('/', function () {
    return redirect('login');
});

// Admin Route
Route::post('/admin/login', [AdminSesiController::class, 'login'])->name('AdminLogin.submit');
Route::get('/admin/login', [AdminSesiController::class, 'index'])->name('admin.login');
Route::post('/admin/logout', function () {
    Auth::logout();
    return redirect('/admin/login');
})->name('logoutAdmin')->middleware('admin:kelurahan');

// Route Admin Kelurahan
Route::middleware(['admin:kelurahan'])->prefix('kelurahan')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/daftar-penduduk', [AdminController::class, 'showDaftarPenduduk'])->name('daftar-penduduk');
    Route::get('/management-surat', [AdminController::class, 'showSurat'])->name('management-surat');
    Route::get('/management-surat/{id}/detail', [AdminController::class, 'showDetail'])->name('detail-surat');
    Route::get('/management-surat/{id}/generate', [AdminController::class, 'generateSurat'])->name('surat.generate');
    Route::put('/management-surat/{id}/update', [AdminController::class, 'updateStatus'])->name('surat.updateStatus');
    Route::post('/management-surat/{id}/upload', [AdminController::class, 'uploadSurat'])->name('surat.upload');
    Route::get('/masukan', [AdminController::class, 'showMasukan'])->name('masukan');
    Route::prefix('daftar-penduduk')->name('daftar-penduduk.')->group(function () {
        Route::get('/tambah-penduduk', [AdminController::class, 'create'])->name('tambah-penduduk');
        Route::post('/tambah-penduduk', [AdminController::class, 'storeCitizen'])->name('tambah.submit');
        Route::get('/edit-penduduk/{nik}', [AdminController::class, 'edit'])->name('edit-penduduk');
        Route::put('/edit-penduduk/{nik}/edit', [AdminController::class, 'update'])->name('edit-penduduk.submit');
        Route::delete('/hapus-penduduk/{nik}', [AdminController::class, 'destroy'])->name('destroy');
    });
});

//  Citizen Route
Route::controller(CitizenController::class)->group(function () {
    Route::get('/login', 'index')->name('login');
    Route::post('/login', 'loginCitizen')->name('login.submit');
});
Route::middleware(['auth:citizen',])->prefix('/')->name('citizen.')->controller(CitizenController::class)->group(function () {
    Route::get('profil', 'profil')->name('profil');
    Route::get('saran', 'viewSaran')->name('beri-saran');
    Route::get('informasi-tani', 'viewTani')->name('informasi-tani');
    Route::post('logout', 'logout')->name('logout');
    Route::get('/saran/beri-saran', [CitizenController::class, 'beriSaranView'])->name('beri-saran.form');
    Route::post('/saran/beri-saran', [CitizenController::class, 'beriSaran'])->name('beri-saran.submit');
});

// Surat 
Route::get('/layanan-surat', [SuratController::class, 'create'])->name('citizen.layanan-surat')->middleware('auth:citizen');
Route::get('/layanan-surat/{id}/detail', [SuratController::class, 'detailCitizenSurat'])->name('citizen.detail-surat')->middleware('auth:citizen');
Route::get('/layanan-surat/{id}/download/', [SuratController::class, 'downloadSurat'])->name('citizen.download.surat')->middleware('auth:citizen');
Route::get('/layanan-surat/buat-surat/izin-usaha', [SuratController::class, 'izinUsahaView'])->name('citizen.izin-usaha')->middleware('auth:citizen');
Route::get('/layanan-surat/buat-surat/kelahiran', [SuratController::class, 'kelahiranView'])->name('citizen.kelahiran')->middleware('auth:citizen');
Route::get('/layanan-surat/buat-surat/kematian', [SuratController::class, 'kematianView'])->name('citizen.kematian')->middleware('auth:citizen');
Route::get('/layanan-surat/buat-surat/pindah-dom', [SuratController::class, 'pindahDomisiliView'])->name('citizen.pindah-dom')->middleware('auth:citizen');
Route::get('/layanan-surat/buat-surat/jaminan-kesehatan', [SuratController::class, 'jaminanKesehatanView'])->name('citizen.jaminan-kesehatan')->middleware('auth:citizen');
Route::get('/layanan-surat/buat-surat', [SuratController::class, 'buatSurat'])->name('citizen.buat-surat')->middleware('auth:citizen');
Route::post('/layanan-surat/buat', [SuratController::class, 'upload'])->name('citizen.buat-surat.submit')->middleware('auth:citizen');


// Route Kecamatan

Route::middleware(['auth'])->group(function () {
    Route::get('/kecamatan/dashboard', [KecamatanController::class, 'dashboard'])
        ->name('admin.kecamatan-dashboard')
        ->middleware('admin:superadmin');
    Route::get('/kecamatan/daftar-kelurahan', [KecamatanController::class, 'showKelurahan'])
        ->name('admin.daftar-kelurahan')
        ->middleware('admin:superadmin');
    Route::get('/kecamatan/daftar-surat-keluar', [KecamatanController::class, 'showSuratKeluar'])
        ->name('admin.daftar-surat-keluar')
        ->middleware('admin:superadmin');
    Route::get('/kecamatan/daftar-kelurahan/{id}/detail', [KecamatanController::class, 'showDetailKelurahan'])->name('admin.detail-kelurahan')
        ->middleware('admin:superadmin');
    Route::get('/kecamatan/daftar-surat-keluar/{id}/detail', [KecamatanController::class, 'detailSuratKeluar'])->name('admin.detail-surat-keluar')
        ->middleware('admin:superadmin');
    Route::get('/daftar-surat-keluar/{id}/download/', [KecamatanController::class, 'downloadSurat'])->name('admin.download.surat')->middleware('admin:superadmin');
});

Route::post('/admin/kecamatan/logout', function () {
    Auth::logout();
    return redirect('/admin/login');
})->name('logoutSuperAdmin')->middleware('admin:superadmin');
