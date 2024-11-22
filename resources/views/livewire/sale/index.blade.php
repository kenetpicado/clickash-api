<div>
    @section('title', 'Usuarios')

    <div class="flex justify-between mb-8 items-center">
        <h1 class="text-2xl font-bold">Ventas</h1>
    </div>

    <div class="grid grid-cols-4 gap-4 mb-8">
        <x-select-filter text="Compañias" name="company_id">
            <option value="">Todas</option>
            @foreach ($companies as $company)
                <option value="{{ $company->id }}">{{ $company->name }} ({{ $company->id }})</option>
            @endforeach
        </x-select-filter>

        @if ($company_id)
            <x-select-filter text="Rifas" name="raffle_id">
                <option value="">Todas</option>
                @foreach ($companies->firstWhere('id', $company_id)->raffles as $raffle)
                    <option value="{{ $raffle->id }}">{{ $raffle->name }}</option>
                @endforeach
            </x-select-filter>
        @endif
    </div>

    <div class="overflow-x-auto border rounded-xl bg-white mb-4">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Compañia</th>
                    <th>Rifa</th>
                    <th>Turno</th>
                    <th>Usuario</th>
                    <th>Cliente</th>
                    <th>Total</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($sales as $sale)
                    <tr>
                        <td>
                            {{ $sale->id }}
                        </td>
                        <td>
                            {{ $sale->company->name }}
                        </td>
                        <td>
                            {{ $sale->raffle->name }}
                        </td>
                        <td>
                            {{ $sale->hour }}
                        </td>
                        <td>
                            {{ $sale->user->name }}
                        </td>
                        <td>
                            {{ $sale->client }}
                        </td>
                        <td>
                            C${{ $sale->total }}
                        </td>
                        <td>
                            {{ $sale->created_at->format('d/m/Y g:i A') }}
                        </td>
                        <td>
                            <a href="{{ route('dashboard.sales.show', $sale) }}" class="btn btn-sm">Detalles</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">No hay datos</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{ $sales->links() }}
</div>
