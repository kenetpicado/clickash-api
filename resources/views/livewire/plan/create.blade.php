<div>
    @section('title', 'Agregar plan')

    <div class="flex justify-between mb-8 items-center">
        <h1 class="text-2xl font-bold">Plan</h1>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
        <div>
            <h2 class="text-base font-semibold mb-2">Informacion del plan</h2>
            <form wire:submit="submit" class="border rounded-xl bg-white p-8 space-y-4">
                <x-input-form text="Nombre" name="form.name" placeholder="Nombre del plan" required />

                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Descripción</span>
                    </div>
                    <textarea wire:model="form.description" rows="3" class="textarea textarea-bordered w-full"
                        placeholder="Descripción del plan" required></textarea>
                    @error('form.description')
                        <div class="label">
                            <span class="label-text-alt">{{ $message }}</span>
                        </div>
                    @enderror
                </label>

                <x-input-form text="Descripción" name="form.description" placeholder="Descripción del plan" required />
                <x-input-form text="Precio" type="number" name="form.price" placeholder="Precio" required />
                <div class="flex items-center justify-end gap-4">
                    <a href="{{ route('dashboard.plans.index') }}" class="btn">
                        Cancelar
                    </a>
                    <button class="btn btn-neutral" type="submit">Guardar</button>
                </div>
            </form>
            @isset($plan)
                <div class="mt-4">
                    <h2 class="text-base font-semibold mb-2">Agregar beneficios</h2>
                    <form wire:submit="submitBenefit" class="border rounded-xl bg-white px-8 py-4">
                        <x-input-form text="Beneficio" name="benefitForm.name"></x-input-form>
                        <div class="flex justify-end">
                            <button class="btn btn-neutral mt-8">Agregar</button>
                        </div>
                    </form>
                </div>
            @endisset
        </div>

        <div>
            <h2 class="text-base font-semibold mb-2">Vista previa</h2>
            <div class="bg-white p-8 rounded-lg flex flex-col gap-6 max-w-lg border">
                <div class="text-center flex flex-col gap-3">
                    <div class="text-xl font-semibold">
                        {{ $form->name }}
                    </div>
                    <div class="text-6xl font-bold">
                        ${{ $form->price }}
                    </div>
                    <span class="text-sm">/mes</span>
                    <span class="text-sm text-center text-gray-400">{{ $form->description }}</span>
                </div>

                @isset($plan)
                    <div class="flex flex-col gap-4 flex-1">
                        @forelse ($plan->benefits as $item)
                            <span class="flex gap-2 items-center text-sm">
                                <x-icons.check color="text-success" />
                                {{ $item->name }}
                                <button wire:click="deleteBenefit({{ $item->id }})">
                                    <x-icons.trash color="text-error" />
                                </button>
                            </span>
                        @empty
                            <div class="flex gap-2">
                                <x-icons.check color="text-success" />
                                No hay beneficios
                            </div>
                        @endforelse
                    </div>
                @endisset
            </div>
        </div>
    </div>
</div>
