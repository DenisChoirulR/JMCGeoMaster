<?php

namespace App\Livewire\City;

use App\Models\City;
use App\Models\Province;
use Livewire\Component;

class CityCreatePage extends Component
{
    public $name;
    public $province_id;
    public $provinces;

    protected $rules = [
        'name' => 'required|string|max:255',
        'province_id' => 'required|exists:provinces,id',
    ];

    public function mount()
    {
        $this->provinces = Province::all();
    }

    public function submit()
    {
        $this->validate();

        $city = new City();
        $city->name = $this->name;
        $city->province_id = $this->province_id;

        $city->save();

        return redirect()->route('cities.index');
    }

    public function render()
    {
        return view('livewire.city.city-create-page');
    }
}
