<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="ClickAsh">
    <meta name="author" content="StrainTeam Developers">
    <title>@yield('title') - {{ config('app.name') }}</title>

    @livewireStyles
    @vite('resources/css/app.css')
</head>

<body>
    <div class="min-h-screen flex flex-col max-w-md mx-auto justify-center">
        <div class="w-full px-6 py-0 h-full">
            {{ $slot }}
        </div>
    </div>
    @livewireScripts
</body>

</html>
