<?php

namespace App\Livewire\City\Partials;

use App\Models\City;
use App\Models\Province;
use Livewire\Component;
use Livewire\WithPagination;

class DataTable extends Component
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

        return view('livewire.city.partials.data-table', [
            'cities' => $cities,
        ]);
    }
}
