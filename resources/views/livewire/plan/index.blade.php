<div>
    @section('title', 'Planes')

    <div class="flex justify-between mb-8 items-center">
        <h1 class="text-2xl font-bold">Planes</h1>
        <a href="{{ route('dashboard.plans.create') }}" class="btn btn-neutral">
            Agregar plan
        </a>
    </div>

    <div class="overflow-x-auto border rounded-xl bg-white">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Precio</th>
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
                            <div class="mb-1 font-bold">
                                {{ $plan->name }}
                            </div>
                            <div class="text-sm text-gray-400">
                                {{ $plan->description }}
                            </div>
                        </td>
                        <td>
                            ${{ $plan->price }}
                        </td>
                        <td>
                            <div class="flex gap-2">
                                <a href="{{ route('dashboard.plans.edit', $plan->id) }}" class="btn btn-sm">
                                    Editar
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
