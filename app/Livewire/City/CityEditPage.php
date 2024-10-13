<?php

namespace App\Livewire\City;

use App\Models\City;
use App\Models\Province;
use Livewire\Component;

class CityEditPage extends Component
{
    public $city;
    public $name;
    public $province_id;
    public $provinces;

    protected $rules = [
        'name' => 'required|string|max:255',
        'province_id' => 'required|exists:provinces,id',
    ];

    public function mount($id)
    {
        $this->provinces = Province::all();

        $this->city = City::findOrFail($id);
        $this->name = $this->city->name;
        $this->province_id = $this->city->province_id;
    }

    public function submit()
    {
        $this->validate();

        $this->city->name = $this->name;
        $this->city->province_id = $this->province_id;

        $this->city->save();

        return redirect()->route('cities.index');
    }

    public function render()
    {
        return view('livewire.city.city-edit-page');
    }
}
