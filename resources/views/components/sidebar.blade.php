<aside class="bg-white min-h-screen w-80">

    <div class="sticky top-0 z-20 items-center gap-2 bg-opacity-90 px-4 py-6 backdrop-blur flex">
        <span class="font-bold text-2xl">Clickash 4</span>
    </div>

    <ul class="menu px-4 py-0">
        <li>
            <details id="admin" open>
                <summary class="group">
                    <span class="flex gap-2 items-end">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-home text-orange-400">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                            <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                            <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                        </svg>
                        <span>Administración</span>
                    </span>
                </summary>
                <ul>
                    <li>
                        <a href="{{ route('dashboard.home') }}" class="group">Inicio</a>
                        <a href="{{ route('dashboard.users.index') }}" class="group">Usuarios</a>
                        <a href="{{ route('dashboard.plans.index') }}" class="group">Planes</a>
                        <a href="{{ route('dashboard.sales.index') }}" class="group">Ventas</a>
                    </li>
                </ul>
            </details>
        </li>
    </ul>
</aside>
