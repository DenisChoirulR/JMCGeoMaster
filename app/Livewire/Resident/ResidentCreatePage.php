<?php

namespace App\Livewire\Resident;

use App\Models\City;
use App\Models\Province;
use App\Models\Resident;
use Livewire\Component;

class ResidentCreatePage extends Component
{
    public $name;
    public $nik;
    public $province_id;
    public $city_id;
    public $provinces;
    public $cities = [];

    protected $rules = [
        'name' => 'required|string|max:255',
        'nik' => 'required|string|max:255|unique:residents,nik',
        'province_id' => 'required|exists:provinces,id',
        'city_id' => 'required|exists:cities,id',
    ];

    public function mount()
    {
        // Load all provinces when the component is mounted
        $this->provinces = Province::all();
    }

    public function updatedProvinceId($value)
    {
        // Load cities based on the selected province
        $this->cities = City::where('province_id', $value)->get();
        $this->city_id = null; // Reset city when province changes
    }

    public function submit()
    {
        $this->validate();

        // Create new Resident
        Resident::create([
            'name' => $this->name,
            'nik' => $this->nik,
            'city_id' => $this->city_id,
        ]);

        // Redirect to a list of residents
        return redirect()->route('residents.index');
    }

    public function render()
    {
        return view('livewire.resident.resident-create-page');
    }
}
