<div class="w-full flex justify-center py-10">

    <div class="bg-white w-full max-w-3xl rounded-3xl shadow-xl border border-gray-100 overflow-hidden">

        <div class="p-8 border-b border-gray-50 bg-white">
            <h1 class="text-2xl font-bold text-gray-800">Nova Disciplina</h1>
            <p class="text-sm text-gray-500">
                Caderno: {{ $this->caderno->nome }}
            </p>
        </div>

        <form wire:submit.prevent="save" class="p-8 space-y-6">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Nome da Disciplina
                </label>

                <input
                    type="text"
                    wire:model="nome"
                    placeholder="Ex: Direito Constitucional"
                    class="w-full rounded-xl border border-gray-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 transition px-4 py-3 text-sm outline-none"
                >

                @error('nome')
                    <span class="text-red-500 text-xs mt-2 block">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="flex justify-end gap-4 pt-6 border-t border-gray-50">

                <a href="{{ route('disciplinas.index', $this->caderno->id) }}" wire:navigate
                    class="px-5 py-2.5 rounded-xl text-sm font-semibold text-gray-600 hover:bg-gray-100 transition">
                    Cancelar
                </a>

                <button type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold py-2.5 px-6 rounded-xl transition shadow-lg shadow-indigo-100">
                    Salvar Disciplina
                </button>

            </div>
        </form>

    </div>
</div>
