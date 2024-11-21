<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\BuyPlanRequest;
use App\Models\Plan;
use App\Services\PlanService;
use Illuminate\Http\Request;

class BuyPlanController extends Controller
{
    public function __construct(
        private readonly PlanService $planService
    ) {}

    public function __invoke(BuyPlanRequest $request, Plan $plan)
    {
        return $this->planService->buy($request->validated(), $plan);
    }
}
