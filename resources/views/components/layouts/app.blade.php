<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Clickash">
    <meta name="author" content="StrainTeam Developers">
    <title>@yield('title') - {{ config('app.name') }}</title>

    @livewireStyles
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-50">
    <div class="drawer lg:drawer-open">
        <input id="sidebar" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content w-full min-h-screen">
            <x-header />
            <main class="p-5">
                {{ $slot }}
            </main>
        </div>

        <div class="drawer-side z-40">
            <label for="sidebar" aria-label="close sidebar" class="drawer-overlay"></label>
            <x-sidebar />
        </div>
    </div>
    @livewireScripts
</body>

</html>
