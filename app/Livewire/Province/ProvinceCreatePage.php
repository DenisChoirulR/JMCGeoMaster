<?php

namespace App\Livewire\Province;

use App\Models\Province;
use Livewire\Component;

class ProvinceCreatePage extends Component
{
    public $name;

    protected $rules = [
        'name' => 'required|string|max:255',
    ];

    public function submit()
    {
        $this->validate();

        $province = new Province();
        $province->name = $this->name;

        $province->save();

        return redirect()->route('provinces.index');
    }

    public function render()
    {
        return view('livewire.province.province-create-page');
    }
}
