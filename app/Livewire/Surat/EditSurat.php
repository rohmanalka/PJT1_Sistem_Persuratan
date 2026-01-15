<?php

namespace App\Livewire\Surat;

use App\Models\SuratModel;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use App\Models\JenisSuratModel;
use App\Models\UserModel;

#[Layout('components.layouts.app', [
    'title' => 'Edit Surat',
    'pageTitle' => 'Edit Pengajuan Surat'
])]

class EditSurat extends Component
{
    public $surat;
    public $jenisSurat;
    public $pejabat;

    public $id_jenis_surat;
    public $judul;
    public $isi;
    public $tanggal_surat;
    public $id_tujuan;
    public $prioritas;

    protected $rules = [
        'id_jenis_surat' => 'required',
        'judul' => 'required|string|max:255',
        'isi' => 'required',
        'tanggal_surat' => 'required|date',
        'id_tujuan' => 'required|exists:users,id_user',
        'prioritas' => 'required|in:biasa,penting,segera',
    ];

    public function mount(SuratModel $surat)
    {
        $this->jenisSurat = JenisSuratModel::all();
        $this->pejabat = UserModel::where('role', 'pejabat')
            ->orderBy('nama')
            ->get();

        abort_if(
            $surat->id_user !== Auth::id() || $surat->status !== 'draft',
            403
        );

        $this->surat = $surat;
        $this->id_jenis_surat = $surat->id_jenis_surat;
        $this->judul = $surat->judul;
        $this->isi = $surat->isi;
        $this->tanggal_surat = $surat->tanggal_surat;
    }

    public function update()
    {
        $this->validate();

        $this->surat->update([
            'id_jenis_surat' => $this->id_jenis_surat,
            'judul' => $this->judul,
            'isi' => $this->isi,
            'prioritas' => $this->prioritas,
            'id_tujuan' => $this->id_tujuan,
            'tanggal_surat' => $this->tanggal_surat ?? now(),
            'status' => 'pending',
        ]);

        session()->flash('success', 'Surat berhasil diedit!');
    }

    public function render()
    {
        return view('livewire.surat.edit_surat');
    }
}
