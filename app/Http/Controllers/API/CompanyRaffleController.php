<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\RaffleRequest;
use App\Models\Company;
use App\Models\Raffle;
use Carbon\Carbon;
use Illuminate\Support\Facades\Request;

class CompanyRaffleController extends Controller
{
    public function index(Company $company)
    {
        return $company->raffles()->select('id', 'name', 'description', 'background_color')->get();
    }

    public function store(RaffleRequest $request, Company $company)
    {
        if (!$company->imOwner()) {
            abort(403, 'No puedes crear sorteos en esta empresa.');
        }

        $company->raffles()->create($request->validated());

        return response()->noContent(200);
    }

    public function show(Company $company, $raffle)
    {
        if (!$company->hasThisRaffle($raffle)) {
            abort(404, 'No se encontró el sorteo.');
        }

        $raffle = Raffle::find($raffle);

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

    public function update(RaffleRequest $request, Company $company, $raffle)
    {
        if (!$company->imOwner()) {
            abort(403, 'No puedes editar sorteos en esta empresa.');
        }

        if (!$company->hasThisRaffle($raffle)) {
            abort(404, 'No se encontró el sorteo.');
        }

        Raffle::where('id', $raffle)->update($request->validated());

        return response()->noContent(200);
    }

    public function destroy(Company $company, $raffle)
    {
        if (!$company->imOwner()) {
            abort(403, 'No puedes eliminar sorteos en esta empresa.');
        }

        if (!$company->hasThisRaffle($raffle)) {
            abort(404, 'No se encontró el sorteo.');
        }

        Raffle::destroy($raffle);

        return response()->noContent(200);
    }
}
