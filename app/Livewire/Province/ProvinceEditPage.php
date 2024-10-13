<?php

namespace App\Livewire\Province;

use App\Models\Province;
use Livewire\Component;

class ProvinceEditPage extends Component
{
    public $province;
    public $name;

    protected $rules = [
        'name' => 'required|string|max:255',
    ];

    public function mount($id)
    {
        $this->province = Province::findOrFail($id);
        $this->name = $this->province->name;
    }

    public function submit()
    {
        $this->validate();

        $this->province->name = $this->name;
        $this->province->save();

        return redirect()->route('provinces.index');
    }

    public function render()
    {
        return view('livewire.province.province-edit-page');
    }
}
