@props(['name', 'text'])

<label class="form-control w-full">
    <div class="label">
        <span class="label-text">
            {{ $text }}
        </span>
    </div>

    <select class="select select-bordered" wire:model.live.debounce.150ms="{{ $name }}">
        {{ $slot }}
    </select>
</label>
