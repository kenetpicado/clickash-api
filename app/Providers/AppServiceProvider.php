<?php

namespace App\Providers;

use App\Models\Company;
use App\Models\Sale;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Carbon::setLocale('es');
        Model::preventLazyLoading();
        JsonResource::withoutWrapping();

        Gate::define('company-owner', function (User $user, Company $company) {
            return $company->imOwner();
        });

        Gate::define('sale-delete', function (User $user, Sale $sale) {
            return $sale->user_id === $user->id;
        });

        Gate::define('sale-show', function (User $user, Sale $sale, Company $company) {
            return $sale->user_id === $user->id || $company->imOwner();
        });
    }
}
