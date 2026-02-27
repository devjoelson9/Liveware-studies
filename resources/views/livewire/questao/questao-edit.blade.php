<div class="w-full flex justify-center py-10">
    <div class="bg-white w-full max-w-4xl rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
        <div class="p-8 border-b border-gray-50 bg-white">
            <h1 class="text-2xl font-bold text-gray-800">Editar Questao</h1>
            <p class="text-sm text-gray-500">{{ $this->disciplina->nome ?? $this->disciplina->name }}</p>
        </div>

        <form wire:submit.prevent="update" class="p-8 space-y-6">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Enunciado</label>
                <textarea rows="3" wire:model="enunciado" class="w-full rounded-xl border border-gray-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 px-4 py-3 text-sm outline-none"></textarea>
                @error('enunciado') <span class="text-red-500 text-xs mt-2 block">{{ $message }}</span> @enderror
            </div>

            <div class="grid md:grid-cols-2 gap-4">
                <div><label class="block text-sm font-semibold text-gray-700 mb-2">Alternativa A</label><input type="text" wire:model="alternativa_a" class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm outline-none">@error('alternativa_a') <span class="text-red-500 text-xs mt-2 block">{{ $message }}</span> @enderror</div>
                <div><label class="block text-sm font-semibold text-gray-700 mb-2">Alternativa B</label><input type="text" wire:model="alternativa_b" class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm outline-none">@error('alternativa_b') <span class="text-red-500 text-xs mt-2 block">{{ $message }}</span> @enderror</div>
                <div><label class="block text-sm font-semibold text-gray-700 mb-2">Alternativa C</label><input type="text" wire:model="alternativa_c" class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm outline-none">@error('alternativa_c') <span class="text-red-500 text-xs mt-2 block">{{ $message }}</span> @enderror</div>
                <div><label class="block text-sm font-semibold text-gray-700 mb-2">Alternativa D</label><input type="text" wire:model="alternativa_d" class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm outline-none">@error('alternativa_d') <span class="text-red-500 text-xs mt-2 block">{{ $message }}</span> @enderror</div>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Alternativa E</label>
                <input type="text" wire:model="alternativa_e" class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm outline-none">
                @error('alternativa_e') <span class="text-red-500 text-xs mt-2 block">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Alternativa Correta</label>
                <select wire:model="alternativa_correta" class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm outline-none">
                    <option value="a">A</option>
                    <option value="b">B</option>
                    <option value="c">C</option>
                    <option value="d">D</option>
                    <option value="e">E</option>
                </select>
                @error('alternativa_correta') <span class="text-red-500 text-xs mt-2 block">{{ $message }}</span> @enderror
            </div>

            <div class="flex justify-end gap-4 pt-6 border-t border-gray-50">
                <a href="{{ route('questoes.index', ['caderno' => $this->caderno->id, 'disciplina' => $this->disciplina->id]) }}" wire:navigate class="px-5 py-2.5 rounded-xl text-sm font-semibold text-gray-600 hover:bg-gray-100 transition">Cancelar</a>
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold py-2.5 px-6 rounded-xl transition shadow-lg shadow-indigo-100">Salvar Alteracoes</button>
            </div>
        </form>
    </div>
</div>
