<div class="w-full flex justify-center py-10 bg-stone-50">
    <div class="w-full max-w-5xl space-y-6">

        <div class="h-36 rounded-2xl border border-stone-200 bg-gradient-to-r from-violet-100 via-white to-indigo-100"></div>

        <section class="-mt-12 rounded-2xl border border-stone-200 bg-white shadow-sm px-6 py-6">
            <div class="text-xs font-medium text-stone-500">
                <a href="{{ route('cadernos.show', $caderno->id) }}" wire:navigate class="hover:text-stone-700">{{ $caderno->nome }}</a>
                <span class="mx-1">/</span>
                <a href="{{ route('simulados.index', $caderno->id) }}" wire:navigate class="hover:text-stone-700">Simulados</a>
            </div>

            <h1 class="mt-3 text-3xl font-bold tracking-tight text-stone-900">{{ $simulado->titulo ?: 'Simulado #' . $simulado->id }}</h1>

            <div class="mt-4 flex flex-wrap gap-2">
                <a href="{{ route('simulados.index', $caderno->id) }}" wire:navigate class="rounded-lg border border-stone-300 px-3 py-1.5 text-sm font-medium text-stone-700 transition hover:bg-stone-100">Voltar</a>
                <a href="{{ route('simulados.edit', ['caderno' => $caderno->id, 'simulado' => $simulado->id]) }}" wire:navigate class="rounded-lg border border-stone-300 px-3 py-1.5 text-sm font-medium text-stone-700 transition hover:bg-stone-100">Editar</a>
                <a href="{{ route('simulados.answer', ['caderno' => $caderno->id, 'simulado' => $simulado->id]) }}" wire:navigate class="rounded-lg bg-indigo-600 px-3 py-1.5 text-sm font-semibold text-white transition hover:bg-indigo-700">Responder simulado</a>
            </div>
        </section>

        <section class="rounded-2xl border border-stone-200 bg-white p-6 shadow-sm">
            <h2 class="text-sm font-semibold uppercase tracking-wide text-stone-500">Resumo</h2>

            <div class="mt-4 grid gap-3 md:grid-cols-4">
                <div class="rounded-xl border border-stone-200 bg-stone-50 px-4 py-3"><p class="text-xs font-medium text-stone-500">Total de questoes</p><p class="mt-1 text-sm font-semibold text-stone-800">{{ $simulado->total_questoes }}</p></div>
                <div class="rounded-xl border border-stone-200 bg-stone-50 px-4 py-3"><p class="text-xs font-medium text-stone-500">Pontuacao</p><p class="mt-1 text-sm font-semibold text-stone-800">{{ $simulado->pontuacao }}</p></div>
                <div class="rounded-xl border border-stone-200 bg-stone-50 px-4 py-3"><p class="text-xs font-medium text-stone-500">Aproveitamento</p><p class="mt-1 text-sm font-semibold text-stone-800">{{ $simulado->total_questoes > 0 ? number_format(($simulado->pontuacao / $simulado->total_questoes) * 100, 1) . '%' : '--' }}</p></div>
                <div class="rounded-xl border border-stone-200 bg-stone-50 px-4 py-3"><p class="text-xs font-medium text-stone-500">Respostas registradas</p><p class="mt-1 text-sm font-semibold text-stone-800">{{ $simulado->respostas_count }}</p></div>
            </div>

            <div class="mt-5 rounded-xl border border-stone-200 bg-stone-50 p-4">
                <p class="text-xs font-medium text-stone-500">Observacoes</p>
                <p class="mt-1 text-sm text-stone-700">{{ $simulado->observacoes ?: 'Sem observacoes.' }}</p>
            </div>
        </section>

        <section class="rounded-2xl border border-stone-200 bg-white p-6 shadow-sm">
            <h2 class="text-sm font-semibold uppercase tracking-wide text-stone-500">Questoes do simulado</h2>

            @php
                $respostasMap = $simulado->respostas->keyBy('questao_id');
            @endphp

            <div class="mt-4 space-y-3">
                @forelse($simulado->questoes as $i => $questao)
                    @php
                        $resposta = $respostasMap->get($questao->id);
                    @endphp
                    <div class="rounded-xl border border-stone-200 bg-stone-50 p-4">
                        <p class="text-sm font-semibold text-stone-800">{{ $i + 1 }}. {{ $questao->enunciado }}</p>
                        <p class="text-xs text-stone-500 mt-1">Disciplina: {{ $questao->disciplina->nome ?? $questao->disciplina->name }}</p>
                        @if($resposta)
                            <p class="text-xs mt-2 {{ $resposta->correta ? 'text-emerald-600' : 'text-rose-600' }}">
                                Marcada: {{ strtoupper($resposta->alternativa_marcada) }} · {{ $resposta->correta ? 'Correta' : 'Incorreta' }}
                            </p>
                        @endif
                    </div>
                @empty
                    <p class="text-sm text-stone-500">Nenhuma questao vinculada.</p>
                @endforelse
            </div>
        </section>
    </div>
</div>
