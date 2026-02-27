<div class="w-full flex justify-center py-12 bg-slate-50">
    <div class="w-full max-w-6xl space-y-8">

        <section class="relative overflow-hidden rounded-3xl border border-slate-200 bg-gradient-to-r from-indigo-600 via-indigo-500 to-sky-500 p-8 text-white shadow-xl">
            <div class="absolute -top-16 -right-16 h-52 w-52 rounded-full bg-white/10"></div>
            <div class="absolute -bottom-20 -left-16 h-64 w-64 rounded-full bg-black/10"></div>

            <div class="relative z-10 flex flex-col gap-6 md:flex-row md:items-center md:justify-between">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-[0.2em] text-indigo-100">Detalhes do caderno</p>
                    <h1 class="mt-3 text-3xl font-bold leading-tight md:text-4xl">{{ $caderno->nome }}</h1>
                    <p class="mt-3 text-sm text-indigo-100">
                        {{ $caderno->banca ?: 'Banca nao definida' }}
                    </p>
                </div>

                <div class="flex flex-wrap items-center gap-3">
                    <a href="{{ route('cadernos.index') }}" wire:navigate
                        class="rounded-xl border border-white/30 bg-white/10 px-4 py-2 text-sm font-semibold text-white transition hover:bg-white/20">
                        Voltar para cadernos
                    </a>

                    <a href="{{ route('disciplinas.create', $caderno->id) }}" wire:navigate
                        class="rounded-xl bg-white px-4 py-2 text-sm font-semibold text-indigo-700 transition hover:bg-indigo-50">
                        Nova disciplina
                    </a>
                </div>
            </div>
        </section>

        <section class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
            <article class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">Data da prova</p>
                <p class="mt-3 text-xl font-bold text-slate-800">
                    {{ $caderno->data_prova ? \Carbon\Carbon::parse($caderno->data_prova)->format('d/m/Y') : 'Nao definida' }}
                </p>
            </article>

            <article class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">Dias restantes</p>
                <p class="mt-3 text-xl font-bold {{ $caderno->data_prova && now()->diffInDays($caderno->data_prova, false) < 0 ? 'text-rose-600' : 'text-amber-600' }}">
                    {{ $caderno->data_prova ? now()->diffInDays($caderno->data_prova, false) . ' dias' : '--' }}
                </p>
            </article>

            <article class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">Disciplinas</p>
                <p class="mt-3 text-xl font-bold text-emerald-600">{{ $caderno->disciplinas_count }}</p>
            </article>

            <article class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">Simulados</p>
                <p class="mt-3 text-xl font-bold text-violet-600">{{ $simuladosCount }}</p>
            </article>
        </section>

        <section class="grid gap-6 lg:grid-cols-3">
            <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm lg:col-span-2">
                <div class="mb-5 flex items-center justify-between">
                    <h2 class="text-lg font-bold text-slate-800">Disciplinas recentes</h2>
                    <a href="{{ route('disciplinas.index', $caderno->id) }}" wire:navigate
                        class="text-sm font-semibold text-indigo-600 transition hover:text-indigo-500">
                        Ver todas
                    </a>
                </div>

                <div class="space-y-3">
                    @forelse($caderno->disciplinas->take(5) as $disciplina)
                        <a href="{{ route('disciplinas.show', ['caderno' => $caderno->id, 'disciplina' => $disciplina->id]) }}" wire:navigate
                            class="flex items-center justify-between rounded-2xl border border-slate-100 bg-slate-50 px-4 py-3 transition hover:border-indigo-200 hover:bg-indigo-50">
                            <div>
                                <p class="font-semibold text-slate-800">{{ $disciplina->nome ?? $disciplina->name }}</p>
                                <p class="text-xs text-slate-500">Criada em {{ $disciplina->created_at?->format('d/m/Y') }}</p>
                            </div>
                            <span class="text-sm font-semibold text-indigo-600">Abrir</span>
                        </a>
                    @empty
                        <div class="rounded-2xl border border-dashed border-slate-300 bg-slate-50 px-4 py-8 text-center">
                            <p class="text-sm font-medium text-slate-600">Nenhuma disciplina cadastrada ainda.</p>
                            <a href="{{ route('disciplinas.create', $caderno->id) }}" wire:navigate
                                class="mt-3 inline-flex rounded-xl bg-indigo-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-indigo-700">
                                Criar primeira disciplina
                            </a>
                        </div>
                    @endforelse
                </div>
            </div>

            <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                <h2 class="text-lg font-bold text-slate-800">Modulos</h2>
                <p class="mt-1 text-sm text-slate-500">Acesse rapidamente as areas deste caderno.</p>

                <div class="mt-5 space-y-3">
                    <a href="{{ route('disciplinas.index', $caderno->id) }}" wire:navigate
                        class="block rounded-2xl border border-indigo-100 bg-indigo-50 p-4 transition hover:bg-indigo-100">
                        <p class="text-sm font-semibold text-indigo-700">Disciplinas</p>
                        <p class="mt-1 text-xs text-indigo-600">{{ $caderno->disciplinas_count }} cadastradas</p>
                    </a>

                    <a href="{{ $simuladosDisponivel ? route('simulados.index', $caderno->id) : '#' }}" @if($simuladosDisponivel) wire:navigate @endif
                        class="block rounded-2xl border border-violet-100 bg-violet-50 p-4 transition {{ $simuladosDisponivel ? 'hover:bg-violet-100' : 'cursor-not-allowed opacity-70' }}">
                        <p class="text-sm font-semibold text-slate-700">Simulados</p>
                        <p class="mt-1 text-xs text-slate-500">
                            {{ $simuladosCount }} cadastrados
                            @if(!$simuladosDisponivel)
                                (execute as migrations para habilitar)
                            @endif
                        </p>
                    </a>
                </div>
            </div>
        </section>
    </div>
</div>
