<div>
    @section('title', 'Usuarios')

    <div class="flex justify-between items-center mb-8">
        <h1 class="text-2xl font-bold">Usuarios</h1>
    </div>

    <div class="overflow-x-auto border rounded-xl bg-white">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Usuario</th>
                    <th>Compañia</th>
                    <th>Workspace</th>
                    <th>Actividad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td>
                            {{ $user->id }}
                        </td>
                        <td>
                            {{ $user->name }}
                        </td>
                        <td>
                            {{ $user->username }}
                        </td>
                        <td>
                            {{ $user->company->name }} ({{ $user->company->status }})
                        </td>
                        <td>
                            {{ $user->company->workspace_code }}
                        </td>
                        <td>
                            {{ $user->last_activity ? $user->last_activity->format('d/m/Y g:i A') : 'Nunca' }}
                        </td>
                        <td>
                            <a href="{{ route('users.show', $user) }}" class="btn btn-sm">Detalles</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">No hay usuarios registrados</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
