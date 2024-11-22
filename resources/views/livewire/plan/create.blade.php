<div>
    @section('title', 'Agregar plan')

    <div class="flex justify-between mb-8 items-center">
        <h1 class="text-2xl font-bold">Nuevo plan</h1>
        <a href="{{ route('dashboard.plans.index') }}" class="btn btn-neutral">
            Cancelar
        </a>
    </div>

    <div class="grid grid-cols-2 gap-4">
        <div>
            <h5 class="font-bold mb-4">Información del plan</h5>
            <form wire:submit="save" class="border rounded-xl bg-white p-8 space-y-4">
                <x-input-form text="Nombre" name="name" placeholder="Nombre del plan" />
                <x-input-form text="Descripción" name="description" placeholder="Descripción del plan" />
                <x-input-form text="Precio" type="number" name="price" placeholder="Precio del plan" />
                <x-input-form text="Descuento" type="number" name="discount" placeholder="Descuento del plan" />
                <div class="flex items-center justify-end gap-4">
                    <a href="{{ route('dashboard.plans.index') }}" class="btn">
                        Cancelar
                    </a>
                    <button class="btn btn-neutral" type="submit">Guardar</button>
                </div>
            </form>
        </div>
        <div>
            <h5 class="font-bold mb-4">Beneficios del plan</h5>
            <div class="border rounded-xl bg-white p-4">
                Hola
            </div>
        </div>
    </div>

</div>
