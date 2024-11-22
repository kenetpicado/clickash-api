<div>
    @section('title', 'Usuarios')

    <div class="flex justify-between mb-8 items-center">
        <h1 class="text-2xl font-bold">Venta: {{ $sale->id }}</h1>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div>
            <h5 class="font-bold mb-4">Detalles</h5>
            <div class="overflow-x-auto border rounded-xl bg-white mb-4">
                <table class="table">
                    <tbody>
                        <tr>
                            <td class="font-bold">ID</td>
                            <td>{{ $sale->id }}</td>
                        </tr>
                        <tr>
                            <td class="font-bold">Recibo</td>
                            <td>No. {{ str_pad($sale->id, 6, '0', STR_PAD_LEFT) }}</td>
                        </tr>
                        <tr>
                            <td class="font-bold">Rifa</td>
                            <td>{{ $sale->raffle->name }}</td>
                        </tr>
                        <tr>
                            <td class="font-bold">Usuario</td>
                            <td>{{ $sale->user->name }}</td>
                        </tr>
                        <tr>
                            <td class="font-bold">Cliente</td>
                            <td>{{ $sale->client }}</td>
                        </tr>
                        <tr>
                            <td class="font-bold">Compañia</td>
                            <td>{{ $sale->company->name }}</td>
                        </tr>
                        <tr>
                            <td class="font-bold">Turno</td>
                            <td>{{ $sale->hour }}</td>
                        </tr>
                        <tr>
                            <td class="font-bold">Total</td>
                            <td>C${{ $sale->total }}</td>
                        </tr>
                        <tr>
                            <td class="font-bold">Fecha</td>
                            <td>{{ $sale->created_at->format('d/m/Y g:i A') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div>
            <h5 class="font-bold mb-4">Dígitos</h5>
            <div class="overflow-x-auto border rounded-xl bg-white mb-4">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Valor</th>
                            <th>Monto</th>
                            <th>Super X</th>
                            <th>Total</th>
                            <th>Estado</th>
                            <th>Premio</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sale->items as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->value }}</td>
                                <td>C${{ $item->amount }}</td>
                                <td>{{ $item->super_x ? 'Si' : 'No' }}</td>
                                <td>C${{ $item->total }}</td>
                                <td>{{ $item->status }}</td>
                                <td>C${{ $item->prize }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
