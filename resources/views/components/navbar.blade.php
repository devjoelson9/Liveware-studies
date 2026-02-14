<nav class="bg-white/80 backdrop-blur-md border-b border-slate-100 px-8 py-4 flex justify-between items-center sticky top-0 z-40">

    <!-- Lado Esquerdo: Saudação Dinâmica -->
    <div class="flex items-baseline gap-2">
    <h2 class="text-sm font-medium text-slate-500">Olá,</h2>
    <p class="text-lg font-semibold text-slate-900">
        {{ explode(' ', auth()->user()->name)[0] }}
        <span class="inline-block ml-1 animate-wave">👋</span>
    </p>
</div>



    <div class="flex items-center gap-6">
        <div class="relative" x-data="{ open: false }">
            <button
                @click="open = !open"
                @click.outside="open = false"
                class="group flex items-center gap-3 p-1 pr-3 rounded-full border border-slate-200 hover:border-indigo-200 hover:bg-indigo-50/50 transition-all duration-200"
            >
                <div class="w-9 h-9 bg-gradient-to-tr from-indigo-600 to-violet-500 rounded-full flex items-center justify-center text-white text-xs font-bold shadow-sm group-hover:scale-105 transition-transform">
                    {{ substr(auth()->user()->name, 0, 1) }}
                </div>

                <div class="hidden md:block text-left">
                    <p class="text-sm font-bold text-slate-700 leading-tight group-hover:text-indigo-600 transition-colors">
                        Meu Perfil
                    </p>
                </div>

                <svg class="w-4 h-4 text-slate-400 transition-transform duration-300" :class="open ? 'rotate-180 text-indigo-500' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            <div
                x-show="open"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 translate-y-2 scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                x-transition:leave-end="opacity-0 translate-y-2 scale-95"
                class="absolute right-0 mt-3 w-64 bg-white rounded-2xl shadow-2xl shadow-slate-200/50 border border-slate-100 overflow-hidden z-50"
                style="display: none;"
            >
                <div class="bg-slate-50/50 px-5 py-4 border-b border-slate-100">
                    <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Conta</p>
                    <p class="text-sm font-bold text-slate-700 truncate mt-1">{{ auth()->user()->email }}</p>
                </div>

                <div class="p-2">
                    <a wire:navigate href="{{route('configuracoes')}}" class="flex items-center gap-3 px-4 py-2.5 text-sm text-slate-600 hover:bg-slate-50 hover:text-indigo-600 rounded-xl transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                        Editar Perfil
                    </a>

                    <hr class="my-2 border-slate-100">

                    <form method="POST" action="{{ route('logout') }}" x-ref="logoutForm">
                        @csrf
                        <button
                            type="button"
                            @click="$refs.logoutForm.submit()"
                            class="w-full flex items-center gap-3 px-4 py-2.5 text-sm text-red-500 hover:bg-red-50 rounded-xl transition-colors"
                        >
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            Sair
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>
