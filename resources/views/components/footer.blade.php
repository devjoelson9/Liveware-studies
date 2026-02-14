<footer class="bg-white/40 backdrop-blur-sm border-t border-slate-100 py-6 px-8 shrink-0">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-4">

        <!-- Esquerda: Copyright e Status -->
        <div class="flex items-center gap-4">
            <p class="text-sm font-medium text-slate-500">
                &copy; {{ date('Y') }} <span class="text-indigo-600 font-bold">TaskFlow</span>. Todos os direitos reservados.
            </p>
            <div class="hidden md:flex items-center gap-2 px-3 py-1 bg-emerald-50 rounded-full border border-emerald-100">
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                </span>
                <span class="text-[10px] font-bold text-emerald-700 uppercase tracking-wider">Sistema Online</span>
            </div>
        </div>

        <!-- Direita: Links e Versão -->
        <div class="flex items-center gap-6">
            <nav class="flex gap-4 text-sm font-medium text-slate-400">
                <a href="#" class="hover:text-indigo-600 transition-colors">Termos</a>
                <a href="#" class="hover:text-indigo-600 transition-colors">Privacidade</a>
                <a href="#" class="hover:text-indigo-600 transition-colors">Suporte</a>
            </nav>

            <div class="h-4 w-px bg-slate-200"></div>

            <div class="flex items-center gap-2">
                <span class="text-[11px] font-bold text-slate-400 bg-slate-100 px-2 py-0.5 rounded-md">v4.2.0</span>
            </div>
        </div>
    </div>
</footer>
