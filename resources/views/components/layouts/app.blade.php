<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Minhas anotações' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <x-disabled-progress-bar />
</head>

<body class="antialiased bg-gray-100">
    <x-toast />

    <main wire:transition class="transition-opacity duration-300 ease-in-out">
        {{ $slot }}
    </main>

    @livewireScripts
</body>
</html>
