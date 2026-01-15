<?php

namespace App\Livewire\Pejabat;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\SuratModel;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;

#[Layout('components.layouts.app', [
    'title' => 'Surat Masuk',
    'pageTitle' => 'Surat Masuk'
])]

class SuratMasuk extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public $search = '';
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

    public function closeModal()
    {
        $this->showModal = false;
        $this->reset('tinjauSurat');
    }

    public function updatingSearch()
    {
        $this->resetPage();
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
            'approved_by' => Auth::id(),
        ]);

        $this->closeModal();
        session()->flash('success', 'Keputusan berhasil disimpan.');
    }

    public function render()
    {
        return view('livewire.pejabat.surat_masuk', [
            'suratMasuk' => SuratModel::where('status', 'pending')
                ->where(function ($q) {
                    $q->where('nomor_surat', 'like', "%{$this->search}%")
                        ->orWhere('judul', 'like', "%{$this->search}%");
                })
                ->latest()
                ->paginate(10),
        ]);
    }
}
