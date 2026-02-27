<div class="w-full flex justify-center py-12 bg-gray-50">
    <div class="bg-white w-full max-w-6xl rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
        <div class="p-8 border-b border-gray-100 flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Questoes</h1>
                <p class="text-sm text-gray-500 mt-1">
                    {{ $this->disciplina->nome ?? $this->disciplina->name }} · {{ $this->caderno->nome }}
                </p>
            </div>

            <div class="flex gap-3">
                <a href="{{ route('disciplinas.show', ['caderno' => $this->caderno->id, 'disciplina' => $this->disciplina->id]) }}" wire:navigate
                    class="px-4 py-2.5 rounded-xl text-sm font-semibold text-gray-600 hover:bg-gray-100 transition">
                    Voltar
                </a>
                <a href="{{ route('questoes.create', ['caderno' => $this->caderno->id, 'disciplina' => $this->disciplina->id]) }}" wire:navigate
                    class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold py-2.5 px-6 rounded-xl transition shadow-lg shadow-indigo-100">
                    Nova Questao
                </a>
            </div>
        </div>

        <div class="divide-y divide-gray-100">
            @forelse($questoes as $questao)
                <div class="px-8 py-6 hover:bg-gray-50">
                    <div class="flex justify-between gap-4">
                        <div>
                            <p class="font-semibold text-gray-800">{{ $questao->enunciado }}</p>
                            <p class="text-xs text-gray-500 mt-2">Correta: {{ strtoupper($questao->alternativa_correta) }}</p>
                        </div>
                        <div class="flex gap-2 shrink-0">
                            <a href="{{ route('questoes.edit', ['caderno' => $this->caderno->id, 'disciplina' => $this->disciplina->id, 'questao' => $questao->id]) }}" wire:navigate
                                class="p-2 text-blue-600 hover:bg-blue-100 rounded-lg transition" title="Editar">
                                <i class="fa-solid fa-pencil"></i>
                            </a>
                            <button wire:click="delete({{ $questao->id }})"
                                wire:confirm="Tem certeza que deseja excluir esta questao?"
                                class="p-2 text-red-500 hover:bg-red-100 rounded-lg transition" title="Excluir">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="px-8 py-20 text-center text-gray-500">
                    <p class="text-lg font-semibold text-gray-700">Nenhuma questao cadastrada</p>
                    <a href="{{ route('questoes.create', ['caderno' => $this->caderno->id, 'disciplina' => $this->disciplina->id]) }}" wire:navigate
                        class="mt-4 inline-flex bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold py-2.5 px-6 rounded-xl transition shadow-lg shadow-indigo-100">
                        Cadastrar primeira questao
                    </a>
                </div>
            @endforelse
        </div>
    </div>
</div>
