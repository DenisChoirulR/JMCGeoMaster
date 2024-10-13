<?php

namespace App\Livewire\Report;

use App\Models\City;
use App\Models\Province;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;
use Livewire\WithPagination;

class ProvinceReportPage extends Component
{
    use WithPagination;

    public $search = '';
    public $sortBy = 'name';
    public $sortDirection = 'asc';
    public $perPage = 10;

    protected $listeners = ['openDeleteModal'];

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function changePerPage()
    {
        $this->resetPage();
    }

    public function sorting($field)
    {
        if ($this->sortBy === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }

        $this->sortBy = $field;
    }

    public function delete($id)
    {
        Province::destroy($id);
        $this->resetPage();
    }

    public function render()
    {
        $provinces = Province::where('name', 'like', '%' . $this->search . '%')
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->perPage);

        return view('livewire.report.province-report-page', [
            'provinces' => $provinces,
        ]);
    }

    public function export()
    {
        $provinces = Province::all();

        $pdf = PDF::loadView('exports.province-export', [
            'provinces' => $provinces,
        ]);

        return response()->streamDownload(
            fn() => print($pdf->output()),
            'province-report.pdf'
        );
    }
}
