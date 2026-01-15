<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\SuratModel;

#[Layout('components.layouts.app', [
    'title' => 'Dashboard Pejabat',
    'pageTitle' => 'Dashboard Pejabat'
])]
class Pejabat extends Component
{
    public $pending = 0;
    public $approved = 0;
    public $rejected = 0;
    public $suratTerbaru = [];

    public function mount()
    {
        $counts = SuratModel::selectRaw("
            SUM(status = 'pending') as pending,
            SUM(status = 'approved') as approved,
            SUM(status = 'rejected') as rejected
        ")->first();

        $this->pending  = $counts->pending;
        $this->approved = $counts->approved;
        $this->rejected = $counts->rejected;

        $this->suratTerbaru = SuratModel::with('jenisSurat')
            ->where('status', 'pending')
            // ->whereIn('status', ['pending', 'approved', 'rejected'])
            ->latest()
            ->take(5)
            ->get();
    }

    public function render()
    {
        return view('livewire.dashboard.pejabat');
    }
}
