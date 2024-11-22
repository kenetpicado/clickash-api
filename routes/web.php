<?php

use App\Livewire\Plans\Index as PlanIndex;
use App\Livewire\User\Index as UserIndex;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/usuarios', UserIndex::class);

Route::get('/planes', PlanIndex::class);
