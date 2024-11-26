<aside class="bg-white min-h-screen w-80">

    <div class="sticky top-0 z-20 items-center gap-2 bg-opacity-90 px-4 py-6 backdrop-blur flex">
        <span class="font-bold text-2xl">ClickAsh</span>
    </div>

    <ul class="menu px-4 py-0">
        <li>
            <details id="admin" open>
                <summary class="group">
                    <span class="flex gap-2 items-end">
                        <x-icons.home />
                        <span>Administración</span>
                    </span>
                </summary>
                <ul>
                    <li>
                        <a href="{{ route('home') }}"
                            class="group {{ request()->routeIs('home') ? 'active' : '' }}">Inicio</a>
                        <a href="{{ route('users.index') }}"
                            class="group {{ request()->routeIs('users.index') ? 'active' : '' }}">Usuarios</a>
                        <a href="{{ route('plans.index') }}"
                            class="group {{ request()->routeIs('plans.index') ? 'active' : '' }}">Planes</a>
                        <a href="{{ route('sales.index') }}"
                            class="group {{ request()->routeIs('sales.index') ? 'active' : '' }}">Ventas</a>
                    </li>
                </ul>
            </details>
            <details id="admin" open>
                <summary class="group">
                    <span class="flex gap-2 items-end">
                        <x-icons.wifi />
                        <span>Sesiones</span>
                    </span>
                </summary>
                <ul>
                    <li>
                        <a href="{{ route('sessions.index') }}"
                            class="group {{ request()->routeIs('sessions.index') ? 'active' : '' }}">
                            Web
                        </a>
                        <a href="{{ route('personal-access-tokens.index') }}"
                            class="group {{ request()->routeIs('personal-access-tokens.index') ? 'active' : '' }}">
                            Móvl
                        </a>
                    </li>
                </ul>
            </details>
        </li>
    </ul>
</aside>
