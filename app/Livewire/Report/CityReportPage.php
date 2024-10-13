<?php

namespace App\Livewire\Report;

use App\Models\City;
use App\Models\Province;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;
use Livewire\WithPagination;

class CityReportPage extends Component
{
    use WithPagination;

    public $search = '';
    public $province_id = '';
    public $sortBy = 'name';
    public $sortDirection = 'asc';
    public $perPage = 10;
    public $provinces;

    public function mount()
    {
        $this->provinces = Province::all();
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedProvinceId()
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
        City::destroy($id);
        $this->resetPage();
    }

    public function render()
    {
        $cities = City::where('name', 'like', '%' . $this->search . '%')
            ->when($this->province_id, function ($query) {
                return $query->where('province_id', $this->province_id);
            })
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->perPage);

        return view('livewire.report.city-report-page', [
            'cities' => $cities,
        ]);
    }

    public function export()
    {
        $cities = City::all();

        $pdf = PDF::loadView('exports.city-export', [
            'cities' => $cities,
        ]);

        return response()->streamDownload(
            fn() => print($pdf->output()),
            'city-report.pdf'
        );
    }
}
