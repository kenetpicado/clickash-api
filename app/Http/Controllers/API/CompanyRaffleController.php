<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\RaffleRequest;
use App\Models\Company;
use App\Models\Raffle;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;

class CompanyRaffleController extends Controller
{
    public function index(Company $company)
    {
        return $company->raffles()->select('id', 'name', 'description', 'background_color')->get();
    }

    public function store(RaffleRequest $request, Company $company)
    {
        Gate::authorize('company-owner', $company);

        $blockedNames = ['Diaria', 'La Hondureña', '3 Monazos'];

        if (in_array($request->name, $blockedNames)) {
            abort(400, 'El nombre de la rifa no está permitido');
        }

        $company->raffles()->create($request->validated());

        return response()->noContent(200);
    }

    public function show(Company $company, Raffle $raffle)
    {
        $raffle->available_hours = collect($raffle->schedule)
            ->where('day_number', now()->dayOfWeek)
            ->value('hours');

        if ($raffle->available_hours) {
            $raffle->available_hours = collect($raffle->available_hours)
                ->filter(function ($hour) {
                    return Carbon::createFromFormat('H:i', $hour)->isFuture();
                })
                ->sort()
                ->values();
        }

        return $raffle;
    }

    public function update(RaffleRequest $request, Company $company, Raffle $raffle)
    {
        Gate::authorize('company-owner', $company);

        $raffle->update($request->validated());

        return response()->noContent(200);
    }

    public function destroy(Company $company, Raffle $raffle)
    {
        Gate::authorize('company-owner', $company);

        $raffle->delete();

        return response()->noContent(200);
    }
}
