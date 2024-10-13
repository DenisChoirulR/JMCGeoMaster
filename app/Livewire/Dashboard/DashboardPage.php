<?php

namespace App\Livewire\Dashboard;

use App\Models\City;
use App\Models\Province;
use App\Models\Resident;
use Livewire\Component;

class DashboardPage extends Component
{
    public $provinceCount;
    public $cityCount;
    public $residentCount;

    public function mount()
    {
        $this->provinceCount = Province::count();
        $this->cityCount = City::count();
        $this->residentCount = Resident::count();
    }

    public function render()
    {
        return view('livewire.dashboard.dashboard-page');
    }
}
