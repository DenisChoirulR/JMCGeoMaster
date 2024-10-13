<?php

namespace App\Livewire\Resident\Partials;

use App\Models\City;
use App\Models\Province;
use App\Models\Resident;
use Livewire\Component;
use Livewire\WithPagination;

class DataTable extends Component
{
    use WithPagination;

    public $search = '';
    public $province_id = '';
    public $city_id = '';
    public $sortBy = 'name';
    public $sortDirection = 'asc';
    public $perPage = 10;
    public $provinces;
    public $cities = [];

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
        $this->cities = City::where('province_id', $this->province_id)->get();
        $this->city_id = '';
    }

    public function updatedCityId()
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
        Resident::destroy($id);
        $this->resetPage();
    }

    public function render()
    {
        $residents = Resident::where('name', 'like', '%' . $this->search . '%')
            ->when($this->province_id, function ($query) {
                $query->whereHas('city.province', function ($query) {
                    $query->where('id', $this->province_id);
                });
            })
            ->when($this->city_id, function ($query) {
                return $query->where('city_id', $this->city_id);
            })
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->perPage);

        return view('livewire.resident.partials.data-table', [
            'residents' => $residents,
        ]);
    }
}
