<?php

use App\Livewire\Home;
use App\Livewire\Plans\Index as PlanIndex;
use App\Livewire\User\Index as UserIndex;
use App\Livewire\Sale\Index as SaleIndex;
use App\Livewire\Sale\Show as SaleShow;
use App\Livewire\User\Show as UserShow;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
    Route::get('/', Home::class)->name('home');

    Route::get('/usuarios', UserIndex::class)->name('users.index');

    Route::get('/usuarios/{user}', UserShow::class)->name('users.show');

    Route::get('/planes', PlanIndex::class)->name('plans.index');

    Route::get('/ventas', SaleIndex::class)->name('sales.index');

    Route::get('/ventas/{sale}', SaleShow::class)->name('sales.show');
});
