<?php

use App\Livewire\City\CityCreatePage;
use App\Livewire\City\CityEditPage;
use App\Livewire\City\CityListPage;
use App\Livewire\Province\ProvinceCreatePage;
use App\Livewire\Province\ProvinceEditPage;
use App\Livewire\Province\ProvinceListPage;
use App\Livewire\Report\CityReportPage;
use App\Livewire\Report\ProvinceReportPage;
use App\Livewire\Resident\ResidentCreatePage;
use App\Livewire\Resident\ResidentEditPage;
use App\Livewire\Resident\ResidentListPage;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', \App\Livewire\Dashboard\DashboardPage::class)->name('dashboard');

Route::group(['prefix' => 'provinces', 'as' => 'provinces.'], function () {
    Route::get('/', ProvinceListPage::class)->name('index');
    Route::get('/create', ProvinceCreatePage::class)->name('create');
    Route::get('/{id}/edit', ProvinceEditPage::class)->name('edit');
});

Route::group(['prefix' => 'cities', 'as' => 'cities.'], function () {
    Route::get('/', CityListPage::class)->name('index');
    Route::get('/create', CityCreatePage::class)->name('create');
    Route::get('/{id}/edit', CityEditPage::class)->name('edit');
});

Route::group(['prefix' => 'residents', 'as' => 'residents.'], function () {
    Route::get('/', ResidentListPage::class)->name('index');
    Route::get('/create', ResidentCreatePage::class)->name('create');
    Route::get('/{id}/edit', ResidentEditPage::class)->name('edit');
});

Route::group(['prefix' => 'reports', 'as' => 'reports.'], function () {
    Route::get('/province', ProvinceReportPage::class)->name('province');
    Route::get('/city', CityReportPage::class)->name('city');
});
