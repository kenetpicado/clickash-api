<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __invoke()
    {
        return UserResource::make(Auth::user()->load('company'));
    }

    public function update(ProfileRequest $request)
    {
        auth()->user()->update($request->validated());

        return response()->noContent(200);
    }
}
