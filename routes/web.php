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

Route::get('/', function () {
    return view('welcome');
});

//AUTH
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//DASBOARD
Route::middleware('auth')->group(function () {

    Route::get('/pejabat/dashboard', function () {
        return view('dashboard.pejabat');
    })->name('pejabat.dashboard')->middleware('pejabat');

    Route::get('/pegawai/dashboard', function () {
        return view('dashboard.pegawai');
    })->name('pegawai.dashboard');
});

//SURAT PEGAWAI
Route::middleware(['auth', 'role:pegawai'])->group(function () {
    Route::get('pegawai/surat', Index::class)->name('surat.riwayat');
    Route::get('pegawai/surat/create', CreateSurat::class)->name('surat.pengajuan');
    Route::get('pegawai/surat/{surat}/edit', EditSurat::class)->name('surat.edit');
    Route::get('pegawai/surat/{surat}', ShowSurat::class)->name('surat.show');
    Route::get('pegawai/surat/{surat}/pdf-preview', function (SuratModel $surat) {
        return Pdf::loadView('pdf.surat', compact('surat'))
            ->stream();
    })->name('surat.pdf.preview');
});

//SURAT PEJABAT
Route::middleware(['auth', 'pejabat'])->group(function () {
    Route::get('/pejabat/surat-masuk', SuratMasuk::class)->name('pejabat.surat.masuk');
    Route::get('/pejabat/surat/{surat}/preview', function (SuratModel $surat) {
        return Pdf::loadView('pdf.surat', compact('surat'))->stream();
    })->name('pejabat.surat.preview');
});