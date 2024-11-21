<?php

namespace App\Services;

use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function register(array $data): string
    {
        if (! filter_var($data['username'], FILTER_VALIDATE_EMAIL)) {
            if (! preg_match('/^[0-9]{8}$/', $data['username'])) {
                abort(422, 'El nombre de usuario debe ser un correo o un número de teléfono de 8 dígitos');
            }
        }

        $user = User::create($data);

        do {
            $workspaceCode = $this->getWorkspaceCode();
        } while (Company::where('workspace_code', $workspaceCode)->exists());

        $name = explode(' ', $user->name)[0];

        $company = $user->company()->create([
            'name' => 'Rifas ' . $name,
            'workspace_code' => $workspaceCode,
            'status' => 'ACTIVO',
        ]);

        $schedule = collect(['D', 'L', 'M', 'X', 'J', 'V', 'S'])
            ->map(function ($day, $index) {
                return [
                    'day_number' => $index,
                    'day' => $day,
                    'hours' => ['11:00', '15:00', '21:00'],
                ];
            });

        $company->raffles()->create([
            'name' => $name . ' Rifa',
            'description' => 'Esta es una rifa de prueba',
            'min' => '01',
            'max' => '99',
            'multiplier' => 70,
            'background_color' => '#F2711C',
            'schedule' => $schedule,
        ]);

        return $user->createToken($user->username)->plainTextToken;
    }

    public function login(array $credentials): string
    {
        $user = User::where('username', $credentials['username'])->first();

        if (! Hash::check($credentials['password'], $user->password)) {
            abort(401, 'Contraseña incorrecta');
        }

        //$user->tokens()->delete();

        return $user->createToken($user->username)->plainTextToken;
    }

    public function logout(): void
    {
        auth()->user()->currentAccessToken()->delete();
    }

    private function getWorkspaceCode(): string
    {
        $all = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

        return substr(str_shuffle($all), 0, 8);
    }
}
