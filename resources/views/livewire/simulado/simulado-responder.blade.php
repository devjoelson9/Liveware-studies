<div class="w-full flex justify-center py-10 bg-gray-50">
    <div class="w-full max-w-5xl space-y-6">
        <div class="bg-white rounded-2xl border border-gray-200 p-6 shadow-sm">
            <h1 class="text-2xl font-bold text-gray-800">Responder: {{ $simulado->titulo ?: 'Simulado #' . $simulado->id }}</h1>
            <p class="text-sm text-gray-500 mt-1">{{ $caderno->nome }} · {{ $simulado->questoes->count() }} questoes</p>
        </div>

        <form wire:submit.prevent="finalizar" class="space-y-4">
            @foreach($simulado->questoes as $index => $questao)
                <div class="bg-white rounded-2xl border border-gray-200 p-6 shadow-sm">
                    <p class="text-sm font-semibold text-gray-700 mb-4">{{ $index + 1 }}. {{ $questao->enunciado }}</p>

                    <div class="space-y-2">
                        @foreach(['a','b','c','d','e'] as $letra)
                            <label class="flex items-start gap-3 rounded-lg border border-gray-200 px-4 py-3 hover:bg-gray-50 cursor-pointer">
                                <input type="radio" wire:model="respostas.{{ $questao->id }}" value="{{ $letra }}" class="mt-1">
                                <span class="text-sm text-gray-700">{{ strtoupper($letra) }}) {{ $questao->{'alternativa_' . $letra} }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>
            @endforeach

            <div class="flex justify-end gap-3">
                <a href="{{ route('simulados.show', ['caderno' => $caderno->id, 'simulado' => $simulado->id]) }}" wire:navigate
                    class="px-5 py-2.5 rounded-xl text-sm font-semibold text-gray-600 hover:bg-gray-100 transition">Cancelar</a>
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold py-2.5 px-6 rounded-xl transition shadow-lg shadow-indigo-100">Finalizar Simulado</button>
            </div>
        </form>
    </div>
</div>
