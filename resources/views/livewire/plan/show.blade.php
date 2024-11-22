<div>
    @section('title', 'Detalles')

    <div class="flex justify-between mb-8 items-center">
        <h1 class="text-2xl font-bold">Detalles</h1>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
        <div>
            <form wire:submit="submit" class="border rounded-xl bg-white px-8 py-4">
                <x-input-form text="Beneficio" name="form.name"></x-input-form>
                <button class="btn btn-neutral mt-8 w-full">Agregar</button>
            </form>
        </div>
        <div class="bg-white p-8 rounded-lg flex flex-col gap-6 max-w-lg border mb-8">
            <div class="text-center flex flex-col gap-3">
                <div class="text-xl font-semibold">
                    {{ $plan->name }}
                </div>
                <div class="text-6xl font-bold">
                    ${{ $plan->price }}
                </div>
                <span class="text-sm">/mes</span>
                <span class="text-sm text-center text-gray-400">{{ $plan->description }}</span>
            </div>

            <div class="flex flex-col gap-4 flex-1">
                @foreach ($plan->benefits as $item)
                    <span class="flex gap-2 items-center text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check text-success">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                            <path d="M9 12l2 2l4 -4" />
                        </svg>
                        {{ $item->name }}
                        <button wire:click="delete({{ $item->id }})">
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-trash text-error">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M4 7l16 0" />
                                <path d="M10 11l0 6" />
                                <path d="M14 11l0 6" />
                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                            </svg>
                        </button>
                    </span>
                @endforeach
            </div>
        </div>
    </div>

</div>
