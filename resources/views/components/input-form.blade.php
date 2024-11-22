@props(['name', 'type' => 'text', 'text', 'placeholder' => '', 'required'])

<div class="form-control w-full">
    <div class="label">
        <span class="label-text">
            {{ $text }}
        </span>
    </div>

    <input id="{{ $name }}" type="{{ $type }}" placeholder="{{ $placeholder }}"
        required="{{ $required ?? false }}" name="{{ $name }}" class="input input-bordered w-full" />

    {{-- <div class="label">
      <span class="label-text-alt text-red-400">
        Error
      </span>
    </div> --}}
</div>
