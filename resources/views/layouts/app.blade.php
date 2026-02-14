<!DOCTYPE html>
<html lang="pt-br" class="h-full scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'TaskFlow' }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />

    <link rel="icon" type="image/svg+xml" href="{{ asset('icon.svg') }}">
<link rel="alternate icon" href="{{ asset('icon.ico') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>

<body class="antialiased h-full overflow-hidden bg-slate-50 text-slate-900">

    <!-- Loading Indicator Global (Livewire 4 Style) -->
    <div wire:loading.delay.shortest class="fixed top-6 right-6 z-[9999]">
        <div class="flex items-center gap-3 bg-white/80 backdrop-blur-md px-4 py-2.5 rounded-2xl shadow-2xl border border-indigo-100">
            <svg class="animate-spin h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            <span class="text-sm font-bold text-indigo-900">Processando...</span>
        </div>
    </div>

    <x-toast />

    <!-- Estrutura Principal -->
    <div class="flex h-screen overflow-hidden">

        <!-- 1. Sidebar Fixa (Esquerda) -->
        <x-sidebar />

        <!-- 2. Área de Conteúdo (Direita) -->
        <div class="flex flex-col flex-1 min-w-0 bg-slate-50">

            <!-- Navbar Fixa no Topo da Área de Conteúdo -->
            <x-navbar />

            <!-- 3. Área de Scroll (Main + Footer) -->
            <main id="main-content" class="flex-1 overflow-y-auto overflow-x-hidden flex flex-col custom-scrollbar">

                <!-- Conteúdo da Página -->
                <div class="flex-1 p-6 lg:p-8">
                    <div wire:loading.class.delay="opacity-50 pointer-events-none" class="transition-opacity duration-300">
                        {{ $slot }}
                    </div>
                </div>

                <!-- Footer (Aparece no fim do scroll do conteúdo) -->
                <x-footer />
            </main>

        </div>
    </div>

    @livewireScripts
    @stack('scripts')

    <style>
        /* Scrollbar elegante para 2026 */
        .custom-scrollbar::-webkit-scrollbar { width: 6px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #e2e8f0;
            border-radius: 10px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #cbd5e1; }
    </style>
</body>
</html>
