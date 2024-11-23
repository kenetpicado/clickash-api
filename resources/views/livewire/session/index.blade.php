<div>
    @section('title', 'Usuarios')

    <div class="flex justify-between items-center mb-8">
        <h1 class="text-2xl font-bold">Sesiones</h1>
    </div>

    <div class="overflow-x-auto border rounded-xl bg-white">
        <table class="table">
            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>IP</th>
                    <th>Agente</th>
                    <th>Actividad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sessions as $item)
                    <tr>
                        <td>
                            {{ $item->user?->name }}
                        </td>
                        <td>
                            {{ $item->ip_address }}
                        </td>
                        <td>
                            {{ $item->user_agent }}
                        </td>
                        <td>
                            {{ $item->last_activity->format('d/m/Y g:i A') }}
                        </td>
                        <td>
                            -
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $sessions->links() }}
</div>
