<div class="w-full flex justify-center py-10 bg-stone-50">
    <div class="w-full max-w-5xl space-y-6">

        <div class="h-40 rounded-2xl border border-stone-200 bg-gradient-to-r from-stone-100 via-stone-50 to-white"></div>

        <section class="-mt-14 px-2 md:px-6">
            <div class="rounded-2xl border border-stone-200 bg-white shadow-sm">
                <div class="px-6 pt-6">
                    <div class="text-xs font-medium text-stone-500">
                        <a href="{{ route('cadernos.index') }}" wire:navigate class="hover:text-stone-700">Cadernos</a>
                        <span class="mx-1">/</span>
                        <a href="{{ route('cadernos.show', $caderno->id) }}" wire:navigate class="hover:text-stone-700">{{ $caderno->nome }}</a>
                        <span class="mx-1">/</span>
                        <a href="{{ route('disciplinas.index', $caderno->id) }}" wire:navigate class="hover:text-stone-700">Disciplinas</a>
                    </div>

                    <h1 class="mt-3 text-3xl font-bold tracking-tight text-stone-900">
                        {{ $disciplina->nome ?? $disciplina->name }}
                    </h1>

                    <div class="mt-4 flex flex-wrap gap-2 pb-6">
                        <a href="{{ route('disciplinas.index', $caderno->id) }}" wire:navigate
                            class="rounded-lg border border-stone-300 px-3 py-1.5 text-sm font-medium text-stone-700 transition hover:bg-stone-100">
                            Voltar
                        </a>
                        <a href="{{ route('disciplinas.edit', ['caderno' => $caderno->id, 'disciplina' => $disciplina->id]) }}" wire:navigate
                            class="rounded-lg border border-stone-300 px-3 py-1.5 text-sm font-medium text-stone-700 transition hover:bg-stone-100">
                            Editar
                        </a>
                    </div>
                </div>

                <div class="border-t border-stone-200 px-6 py-5">
                    <h2 class="text-sm font-semibold uppercase tracking-wide text-stone-500">Propriedades</h2>

                    <div class="mt-4 grid gap-3 md:grid-cols-2">
                        <div class="rounded-xl border border-stone-200 bg-stone-50 px-4 py-3">
                            <p class="text-xs font-medium text-stone-500">Caderno</p>
                            <p class="mt-1 text-sm font-semibold text-stone-800">{{ $caderno->nome }}</p>
                        </div>

                        <div class="rounded-xl border border-stone-200 bg-stone-50 px-4 py-3">
                            <p class="text-xs font-medium text-stone-500">Banca</p>
                            <p class="mt-1 text-sm font-semibold text-stone-800">{{ $caderno->banca ?: 'Nao definida' }}</p>
                        </div>

                        <div class="rounded-xl border border-stone-200 bg-stone-50 px-4 py-3">
                            <p class="text-xs font-medium text-stone-500">Data da prova</p>
                            <p class="mt-1 text-sm font-semibold text-stone-800">
                                {{ $caderno->data_prova ? \Carbon\Carbon::parse($caderno->data_prova)->format('d/m/Y') : 'Nao definida' }}
                            </p>
                        </div>

                        <div class="rounded-xl border border-stone-200 bg-stone-50 px-4 py-3">
                            <p class="text-xs font-medium text-stone-500">Questoes da disciplina</p>
                            <p class="mt-1 text-sm font-semibold text-stone-800">{{ $disciplina->questoes_count }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="rounded-2xl border border-stone-200 bg-white p-6 shadow-sm">
            <div class="flex items-center justify-between">
                <h2 class="text-lg font-semibold text-stone-900">Conteudo da disciplina</h2>
                <span class="text-xs font-medium text-stone-500">Visualizacao estilo pagina</span>
            </div>

            <div class="mt-5 space-y-3">
                <a href="{{ route('questoes.index', ['caderno' => $caderno->id, 'disciplina' => $disciplina->id]) }}" wire:navigate
                    class="flex items-center justify-between rounded-xl border border-stone-200 px-4 py-3 transition hover:bg-stone-50">
                    <div>
                        <p class="text-sm font-semibold text-stone-800">Banco de questoes</p>
                        <p class="text-xs text-stone-500">Cadastre e gerencie questoes desta disciplina</p>
                    </div>
                    <span class="text-sm text-stone-500">Abrir</span>
                </a>

                <a href="#" class="flex items-center justify-between rounded-xl border border-dashed border-stone-300 px-4 py-3 text-stone-400">
                    <div>
                        <p class="text-sm font-semibold">Questoes e revisoes</p>
                        <p class="text-xs">Em breve no sistema</p>
                    </div>
                    <span class="text-sm">Em breve</span>
                </a>
            </div>
        </section>
    </div>
</div>
