<div>
    @section('title', 'Usuarios')

    <div class="flex justify-between mb-8 items-center">
        <h1 class="text-2xl font-bold">Ventas</h1>
    </div>

    <div class="overflow-x-auto border rounded-xl bg-white mb-4">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Rifa</th>
                    <th>Usuario</th>
                    <th>Compañia</th>
                    <th>Turno</th>
                    <th>Total</th>
                    <th>Cliente</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sales as $sale)
                    <tr>
                        <td>
                            {{ $sale->id }}
                        </td>
                        <td>
                            {{ $sale->raffle->name }}
                        </td>
                        <td>
                            {{ $sale->user->name }}
                        </td>
                        <td>
                            {{ $sale->company->name }}
                        </td>
                        <td>
                            {{ $sale->hour }}
                        </td>
                        <td>
                            C$ {{ $sale->total }}
                        </td>
                        <td>
                            {{ $sale->client }}
                        </td>
                        <td>
                            {{ $sale->created_at->format('d/m/Y g:i A') }}
                        </td>
                        <td>
                            <a href="{{ route('dashboard.sales.show', $sale) }}" class="btn btn-sm">Detalles</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $sales->links() }}
</div>
