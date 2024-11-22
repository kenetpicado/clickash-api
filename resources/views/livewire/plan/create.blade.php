<div>
    @section('title', 'Agregar plan')

    <div class="flex justify-between mb-8 items-center">
        <h1 class="text-2xl font-bold">Nuevo plan</h1>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
        <form wire:submit="submit" class="border rounded-xl bg-white p-8 space-y-4">
            <x-input-form text="Nombre" name="form.name" placeholder="Nombre del plan" required />
            <x-input-form text="Descripción" name="form.description" placeholder="Descripción del plan" required />
            <x-input-form text="Precio" type="number" name="form.price" placeholder="Precio del plan" required />
            <x-input-form text="Descuento" type="number" name="form.discount" placeholder="Descuento del plan"
                required />
            <div class="flex items-center justify-end gap-4">
                <a href="{{ route('dashboard.plans.index') }}" class="btn">
                    Cancelar
                </a>
                <button class="btn btn-neutral" type="submit">Guardar</button>
            </div>
        </form>
    </div>

</div>
