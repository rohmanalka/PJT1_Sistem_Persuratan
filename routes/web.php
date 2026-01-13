<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\AuthController;
use App\Livewire\Surat\Index;
use App\Livewire\Surat\CreateSurat;
use App\Livewire\Surat\EditSurat;
use App\Livewire\Surat\ShowSurat;
use App\Models\SuratModel;
use App\Livewire\Pejabat\SuratMasuk;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Livewire\Dashboard\Pegawai;

Route::get('/', function () {
    return view('auth.login');
});

//AUTH
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//SURAT PEGAWAI
Route::middleware(['auth', 'role:pegawai'])->group(function () {
    Route::get('/pegawai/dashboard', Pegawai::class)->name('pegawai.dashboard');
    Route::get('pegawai/surat', Index::class)->name('pegawai.surat.riwayat');
    Route::get('pegawai/surat/create', CreateSurat::class)->name('pegawai.surat.pengajuan');
    Route::get('pegawai/surat/{surat}/edit', EditSurat::class)->name('pegawai.surat.edit');
    Route::get('pegawai/surat/{surat}/pdf-preview', function (SuratModel $surat) {
        return Pdf::loadView('pdf.surat', compact('surat'))
            ->stream();
    })->name('pegawai.surat.pdf.preview');
});

//SURAT PEJABAT
Route::middleware(['auth', 'pejabat'])->group(function () {
    Route::get('/pejabat/dashboard', Pegawai::class)->name('pejabat.dashboard');
    Route::get('/pejabat/surat-masuk', SuratMasuk::class)->name('pejabat.surat.masuk');
    Route::get('/pejabat/surat/{surat}/preview', function (SuratModel $surat) {
        return Pdf::loadView('pdf.surat', compact('surat'))->stream();
    })->name('pejabat.surat.preview');
});

//QR
Route::get('/verifikasi-surat/{surat}', function (SuratModel $surat) {
    return view('livewire.surat.verifikasi', compact('surat'));
})->name('surat.verifikasi');