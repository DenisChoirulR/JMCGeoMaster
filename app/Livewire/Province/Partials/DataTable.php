<?php

namespace App\Livewire\Province\Partials;

use App\Models\Province;
use Livewire\Component;
use Livewire\WithPagination;

class DataTable extends Component
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

        return view('livewire.province.partials.data-table', [
            'provinces' => $provinces,
        ]);
    }
}
