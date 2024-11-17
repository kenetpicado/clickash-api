<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CompanyController;
use App\Http\Controllers\API\CompanyRaffleController;
use App\Http\Controllers\API\ProfileController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\WorkspaceController;
use App\Http\Middleware\Activity;
use App\Http\Middleware\VerifyCompany;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::post('login', [AuthController::class, 'login'])->middleware('api');

    Route::post('registro', [AuthController::class, 'register']);

    Route::middleware(['auth:sanctum', Activity::class])->group(function () {
        Route::post('logout', [AuthController::class, 'logout']);

        Route::get('perfil', ProfileController::class);

        Route::put('perfil', [ProfileController::class, 'update']);

        Route::apiResource('empresas', CompanyController::class)
            ->parameters(['empresas' => 'company'])
            ->only(['index', 'update']);

        Route::apiResource('usuarios', UserController::class)
            ->parameter('usuarios', 'user')
            ->only(['index', 'destroy']);

        Route::apiResource('empresas.rifas', CompanyRaffleController::class)
            ->parameters(['rifas' => 'raffle', 'empresas' => 'company'])
            ->only(['index', 'store', 'show', 'update', 'destroy'])
            ->middleware(VerifyCompany::class);

        Route::post('workspace', WorkspaceController::class);
    });
});
