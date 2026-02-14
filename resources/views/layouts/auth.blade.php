<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'TaskFlow' }}</title>
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
/>


    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" type="image/svg+xml" href="{{ asset('icon.svg') }}">
<link rel="alternate icon" href="{{ asset('icon.ico') }}">
    @livewireStyles
    <x-disabled-progress-bar />
</head>

<body class="bg-gray-100">

    <div>
        {{ $slot }}
    </div>

    @livewireScripts
</body>
</html>
