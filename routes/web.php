<?php

use App\Livewire\Home;
use App\Livewire\Plan\Index as PlanIndex;
use App\Livewire\Session\Index as SessionIndex;
use App\Livewire\PersonalAccessToken\Index as PersonalAccessTokenIndex;
use App\Livewire\Plan\Create as PlanCreate;
use App\Livewire\Plan\Edit as PlanEdit;
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

    Route::get('/planes/crear', PlanCreate::class)->name('plans.create');

    Route::get('/planes/{plan}/editar', PlanEdit::class)->name('plans.edit');

    Route::get('/ventas', SaleIndex::class)->name('sales.index');

    Route::get('/ventas/{sale}', SaleShow::class)->name('sales.show');

    Route::get('/sesiones', SessionIndex::class)->name('sessions.index');

    Route::get('/tokens-de-acceso-personal', PersonalAccessTokenIndex::class)->name('personal-access-tokens.index');
});
