<div class="navbar bg-white">
    <div class="flex-0 lg:hidden">
        <button class="btn btn-square btn-ghost">
            <label for="sidebar" class="drawer-button lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                </svg>
            </label>
        </button>
    </div>
    <div class="flex-1"></div>
    <div class="flex-none">
        <div class="dropdown dropdown-end">
            <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                <div class="w-10 rounded-full">
                    <img alt="Profile"
                        src="https://img.freepik.com/psd-gratis/ilustracion-3d-avatar-o-perfil-humano_23-2150671159.jpg" />
                </div>
            </div>
            <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-[1] w-52 p-2 shadow">
                <li><a>Perfil</a></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit">Cerrar sesión</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
