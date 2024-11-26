<div>
    @section('title', 'Tokens de acceso personal')

    <div class="flex justify-between items-center mb-8">
        <h1 class="text-2xl font-bold">
            Tokens de acceso personal
        </h1>
    </div>

    <div class="overflow-x-auto border rounded-xl bg-white">
        <table class="table">
            <thead>
                <tr>
                    <th>Modelo</th>
                    <th>Nombre</th>
                    <th>Habilidades</th>
                    <th>Actividad</th>
                    <th>Creado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($personalAccessTokens as $item)
                    <tr>
                        <td>
                            {{ $item->tokenable?->name }}
                        </td>
                        <td>
                            {{ $item->name }}
                        </td>
                        <td>
                            {{ $item->abilities }}
                        </td>
                        <td>
                            {{ $item->last_used_at ? $item->last_used_at->format('d/m/Y g:i A') : '' }}
                        </td>
                        <td>
                            {{ $item->created_at->format('d/m/Y g:i A') }}
                        </td>
                        <td>
                            <button wire:click="delete({{ $item }})" type="button" class="btn btn-sm">
                                Detalles
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No hay datos</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{ $personalAccessTokens->links() }}
</div>
