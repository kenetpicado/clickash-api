<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = auth()->user()->company->users;

        return UserResource::collection($users);
    }

    public function update(User $user)
    {
        //TODO: Actualizar el estado de activo - inactivo
        //Solo puede estar activo si tiene espacio

        return response()->noContent(200);
    }

    public function destroy(User $user)
    {
        auth()->user()->company->users()->detach($user->id);

        return response()->noContent(200);
    }
}
