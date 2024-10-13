<?php

namespace App\Livewire\Resident;

use App\Models\City;
use App\Models\Province;
use App\Models\Resident;
use Livewire\Component;

class ResidentEditPage extends Component
{
    public $resident;
    public $name;
    public $nik;
    public $province_id;
    public $city_id;
    public $provinces;
    public $cities = [];

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'nik' => 'required|string|max:255|unique:residents,nik,' . $this->resident->id,
            'province_id' => 'required|exists:provinces,id',
            'city_id' => 'required|exists:cities,id',
        ];
    }

    public function mount($id)
    {
        $this->resident = Resident::findOrFail($id);
        $this->name = $this->resident->name;
        $this->nik = $this->resident->nik;
        $this->province_id = $this->resident->city->province_id;
        $this->city_id = $this->resident->city_id;

        $this->provinces = Province::all();
        $this->cities = City::where('province_id', $this->province_id)->get();
    }

    public function updatedProvinceId($value)
    {
        $this->cities = City::where('province_id', $value)->get();
        $this->city_id = null;
    }

    public function submit()
    {
        $this->validate();

        $this->resident->update([
            'name' => $this->name,
            'nik' => $this->nik,
            'city_id' => $this->city_id,
        ]);

        return redirect()->route('residents.index');
    }

    public function render()
    {
        return view('livewire.resident.resident-edit-page');
    }
}
