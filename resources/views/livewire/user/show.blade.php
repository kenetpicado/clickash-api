<div>
    @section('title', 'Usuarios')

    <div class="flex justify-between mb-8 items-center">
        <h1 class="text-2xl font-bold">Usuario: {{ $user->name }}</h1>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div>
            <h5 class="font-bold mb-4">Información del usuario</h5>
            <div class="overflow-x-auto border rounded-xl bg-white">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Nombre</td>
                            <td>
                                {{ $user->name }}
                            </td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td>
                                {{ $user->username }}
                            </td>
                        </tr>
                        <tr>
                            <td>Actividad</td>
                            <td>
                                {{ $user->last_activity ? $user->last_activity->format('d/m/Y g:i A') : 'Nunca' }}
                            </td>
                        </tr>
                        <tr>
                            <td>Registrado</td>
                            <td>
                                {{ $user->created_at->format('d/m/Y g:i A') }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div>
            <h5 class="font-bold mb-4">Información de la compañia</h5>
            <div class="overflow-x-auto border rounded-xl bg-white">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Nombre</td>
                            <td>
                                {{ $user->company->name }}
                            </td>
                        </tr>
                        <tr>
                            <td>Workspace</td>
                            <td>
                                {{ $user->company->workspace_code }}
                            </td>
                        </tr>
                        <tr>
                            <td>Estado</td>
                            <td>
                                {{ $user->company->status }}
                            </td>
                        </tr>
                        <tr>
                            <td>Registrado</td>
                            <td>
                                {{ $user->company->created_at->format('d/m/Y g:i A') }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div>
            <h5 class="font-bold mb-4">Vendedores</h5>
            <div class="overflow-x-auto border rounded-xl bg-white">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Username</th>
                            <th>Actividad</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($user->company->users as $seller)
                            <tr>
                                <td>
                                    {{ $seller->name }}
                                </td>
                                <td>
                                    {{ $seller->username }}
                                </td>
                                <td>
                                    {{ $seller->last_activity ? $seller->last_activity->format('d/m/Y g:i A') : 'Nunca' }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">No hay vendedores registrados</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-span-1 lg:col-span-2">
            <h5 class="font-bold mb-4">Rifas</h5>
            <div class="overflow-x-auto border rounded-xl bg-white">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Tipo</th>
                            <th>Minimo</th>
                            <th>Maximo</th>
                            <th>Límite individual</th>
                            <th>Límite general</th>
                            <th>Multiplicador</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($user->company->raffles as $raffle)
                            <tr>
                                <td>
                                    {{ $raffle->name }}
                                </td>
                                <td>
                                    {{ $raffle->is_date ? 'Fecha' : 'Número' }}
                                </td>
                                <td>
                                    {{ $raffle->min }}
                                </td>
                                <td>
                                    {{ $raffle->max }}
                                </td>
                                <td>
                                    {{ $raffle->individual_limit ?? 'Ninguno' }}
                                </td>
                                <td>
                                    {{ $raffle->general_limit ?? 'Ninguno' }}
                                </td>
                                <td>
                                    {{ $raffle->multiplier }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">No hay vendedores registrados</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-span-1 lg:col-span-2">
            <h5 class="font-bold mb-4">Historial de planes</h5>
            <div class="overflow-x-auto border rounded-xl bg-white">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Estado</th>
                            <th>Periodo</th>
                            <th>Plan</th>
                            <th>Usuarios</th>
                            <th>Pagado</th>
                            <th>Método de pago</th>
                            <th>Estado de pago</th>
                            <th>Pagado el</th>
                            <th>Creado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($user->company->plans->sortBy('expires_at') as $plan)
                            <tr>
                                <td>
                                    @if ($plan->pivot->expires_at->isPast())
                                        <span class="badge badge-ghost">Expirado</span>
                                    @elseif (now()->between($plan->pivot->started_at, $plan->pivot->expires_at))
                                        <span class="badge badge-success">En curso</span>
                                    @else
                                        <span class="badge badge-warning">Pendiente</span>
                                    @endif
                                </td>
                                <td>
                                    {{ $plan->pivot->started_at->format('d/m/Y') }} -
                                    {{ $plan->pivot->expires_at->format('d/m/Y') }}
                                </td>
                                <td>
                                    {{ $plan->name }}
                                </td>
                                <td>
                                    {{ $plan->pivot->users_limit }}
                                </td>
                                <td>
                                    ${{ $plan->pivot->total }}
                                </td>
                                <td>
                                    <div class="mb-1">
                                        {{ $plan->pivot->payment_method }}
                                    </div>
                                    <div class="text-sm text-gray-400">
                                        {{ $plan->pivot->reference }}
                                    </div>
                                </td>
                                <td>
                                    {{ $plan->pivot->status }}
                                </td>
                                <td>
                                    {{ $plan->pivot->paid_at ? $plan->pivot->paid_at->format('d/m/Y g:i A') : '-' }}
                                </td>
                                <td>
                                    {{ $plan->pivot->created_at->format('d/m/Y g:i A') }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="12" class="text-center">No hay planes registrados</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
