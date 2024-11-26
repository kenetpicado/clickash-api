<x-layouts.guest>
    <div class="flex flex-col justify-center items-center mb-4">
        <h1 class="text-base font-bold">Inicia sesión</h1>
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="flex flex-col gap-4 mb-8">
            <x-input-form text="Correo" name="username" placeholder="Ingrese su correo" required />

            <x-input-form text="Contraseña" name="password" type="password" placeholder="Ingrese su contraseña"
                required />

            <div class="form-control">
                <label class="label cursor-pointer">
                    <div class="flex items-center gap-2">
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}
                            class="checkbox" />
                        <span class="label-text">Recordarme</span>
                    </div>
                </label>
            </div>
        </div>

        <div>
            <button type="submit" class="btn btn-neutral w-full"> Ingresar </button>
        </div>
    </form>
</x-layouts.guest>
