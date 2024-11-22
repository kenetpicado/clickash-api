@props(['name', 'type' => 'text', 'text', 'placeholder' => '', 'required' => false])

<div class="form-control w-full">
    <div class="label">
        <span class="label-text">
            {{ $text }}
        </span>
    </div>

    <input id="{{ $name }}" type="{{ $type }}" placeholder="{{ $placeholder }}"
        @if ($required) required @endif name="{{ $name }}" wire:model="{{ $name }}"
        class="input input-bordered w-full" />

    @error('form.title')
        <div class="label">
            <span class="label-text-alt text-red-400">
                {{ $message }}
            </span>
        </div>
    @enderror

</div>
