<div>
    @section('title', 'Planes')

    <div class="flex justify-between mb-8 items-center">
        <h1 class="text-2xl font-bold">Planes</h1>
    </div>

    <div class="overflow-x-auto border rounded-xl bg-white">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Descuento</th>
                    <th>Precio final</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($plans as $plan)
                    <tr>
                        <td>
                            {{ $plan->id }}
                        </td>
                        <td>
                            <div class="mb-1 text-lg font-bold">
                                {{ $plan->name }}
                            </div>
                            <div class="text-sm text-gray-400">
                                {{ $plan->description }}
                            </div>
                        </td>
                        <td>
                            C$ {{ $plan->price }}
                        </td>
                        <td>
                            C$ {{ $plan->discount }}
                        </td>
                        <td class="font-bold">
                            C$ {{ $plan->price - $plan->discount }}
                        </td>
                        <td>
                            <button class="btn">Detalles</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
