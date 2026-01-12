<?php

namespace App\Livewire\Pejabat;

use Livewire\Component;
use App\Models\SuratModel;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app', [
    'title' => 'Surat Masuk',
    'pageTitle' => 'Surat Masuk'
])]

class SuratMasuk extends Component
{
    public $showModal = false;

    public $tinjauSurat;
    public $status = 'approved';
    public $catatan = '';

    public function openReview($id)
    {
        $this->tinjauSurat = SuratModel::findOrFail($id);
        $this->status = 'approved';
        $this->catatan = '';
        $this->showModal = true;
    }

    public function submitReview()
    {
        $rules = [
            'status' => 'required|in:approved,rejected',
        ];

        if ($this->status === 'rejected') {
            $rules['catatan'] = 'required|min:5';
        }

        $this->validate($rules);

        $this->tinjauSurat->update([
            'status' => $this->status,
            'catatan' => $this->catatan,
            'approved_at' => $this->status === 'approved' ? now() : null,
        ]);

        $this->showModal = false;
        $this->reset('tinjauSurat');
    }

    public function render()
    {
        return view('livewire.pejabat.surat_masuk', [
            'suratMasuk' => SuratModel::where('status', 'pending')->latest()->get(),
        ]);
    }
}
