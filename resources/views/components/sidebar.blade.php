<aside class="bg-white min-h-screen w-80">

    <div class="sticky top-0 z-20 items-center gap-2 bg-opacity-90 px-4 py-6 backdrop-blur flex">
        <span class="font-bold text-2xl">Clickash 4</span>
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
                        <a href="{{ route('dashboard.home') }}"
                            class="group {{ request()->routeIs('dashboard.home') ? 'active' : '' }}">Inicio</a>
                        <a href="{{ route('dashboard.users.index') }}"
                            class="group {{ request()->routeIs('dashboard.users.index') ? 'active' : '' }}">Usuarios</a>
                        <a href="{{ route('dashboard.plans.index') }}"
                            class="group {{ request()->routeIs('dashboard.plans.index') ? 'active' : '' }}">Planes</a>
                        <a href="{{ route('dashboard.sales.index') }}"
                            class="group {{ request()->routeIs('dashboard.sales.index') ? 'active' : '' }}">Ventas</a>
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
                        <a href="{{ route('dashboard.sessions.index') }}"
                            class="group {{ request()->routeIs('dashboard.sessions.index') ? 'active' : '' }}">
                            Web
                        </a>
                        <a href="{{ route('dashboard.personal-access-tokens.index') }}"
                            class="group {{ request()->routeIs('dashboard.personal-access-tokens.index') ? 'active' : '' }}">
                            Móvl
                        </a>
                    </li>
                </ul>
            </details>
        </li>
    </ul>
</aside>
