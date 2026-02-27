<aside class="w-72 bg-slate-900 border-r border-slate-800 flex flex-col h-screen sticky top-0 transition-all duration-300">
    <div class="p-6 mb-4">
        <div class="flex items-center gap-3 px-2">
            <div
                class="w-10 h-10 bg-indigo-600 rounded-xl flex items-center justify-center shadow-lg shadow-indigo-500/20">
                <svg xmlns="http://www.w3.org" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
            </div>
            <span class="text-xl font-bold tracking-tight text-white">Task<span
                    class="text-indigo-500">Flow</span></span>
        </div>
    </div>

    <nav class="flex-1 px-4 space-y-1.5 overflow-y-auto">
        <p class="text-[10px] uppercase tracking-widest text-slate-500 font-bold mb-4 ml-4">Menu Principal</p>

        <a wire:navigate href="{{ route('dashboard.index') }}"
            class="{{ request()->routeIs('dashboard.index') ? 'bg-indigo-600 text-white shadow-md shadow-indigo-600/20' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }} group flex items-center gap-3 px-4 py-3 rounded-2xl transition-all duration-200 font-medium">
            <svg xmlns="http://www.w3.org" class="h-5 w-5 transition-colors" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            <span>Dashboard</span>
        </a>

        <a wire:navigate href="{{ route('tarefas.index') }}"
            class="{{ request()->routeIs('tarefas.*') ? 'bg-indigo-600 text-white shadow-md shadow-indigo-600/20' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }} group flex items-center gap-3 px-4 py-3 rounded-2xl transition-all duration-200 font-medium">
            <svg xmlns="http://www.w3.org" class="h-5 w-5 transition-colors" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
            </svg>
            <span>Minhas Tarefas</span>
            @if(isset($taskCount) && $taskCount > 0)
            <span class="ml-auto bg-indigo-500/20 text-indigo-300 py-0.5 px-2 rounded-lg text-xs">{{ $taskCount
                }}</span>
            @endif
        </a>

        <a wire:navigate href="{{ route('cadernos.index') }}"
            class="{{ request()->routeIs('cadernos.*') ? 'bg-indigo-600 text-white shadow-md shadow-indigo-600/20' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }} group flex items-center gap-3 px-4 py-3 rounded-2xl transition-all duration-200 font-medium">

            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-colors" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5A4.5 4.5 0 003 9.5v9A4.5 4.5 0 007.5 23c1.746 0 3.332.477 4.5 1.253M12 6.253C13.168 5.477 14.754 5 16.5 5A4.5 4.5 0 0121 9.5v9A4.5 4.5 0 0116.5 23c-1.746 0-3.332.477-4.5 1.253" />
            </svg>

            <span>Cadernos</span>
        </a>

        <a wire:navigate href="{{ route('configuracoes') }}"
            class="{{ request()->routeIs('configuracoes') ? 'bg-indigo-600 text-white shadow-md shadow-indigo-600/20' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }} group flex items-center gap-3 px-4 py-3 rounded-2xl transition-all duration-200 font-medium">
            <svg xmlns="http://www.w3.org" class="h-5 w-5 transition-colors" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            <span>Configurações</span>
        </a>
    </nav>

    <div class="p-4 mt-auto border-t border-slate-800">
        <div class="flex items-center gap-3 p-2 rounded-2xl bg-slate-800/50">
            <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=6366f1&color=fff"
                class="w-10 h-10 rounded-xl" alt="Avatar" class="w-10 h-10 rounded-xl" alt="Avatar">
            <div class="flex-1 overflow-hidden">
                <p class="text-sm font-bold text-white truncate">{{ auth()->user()->name }}</p>
                <p class="text-xs text-slate-500 truncate">{{ auth()->user()->email }}</p>
            </div>
        </div>
    </div>
</aside>
