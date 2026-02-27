<div class="w-full flex justify-center py-12 bg-gray-50">

    <div class="bg-white w-full max-w-3xl rounded-3xl shadow-xl border border-gray-100 overflow-hidden">

        {{-- Cabeçalho --}}
        <div class="p-8 border-b border-gray-100">
            <h1 class="text-2xl font-bold text-gray-800">
                Editar Caderno
            </h1>
            <p class="text-sm text-gray-500 mt-1">
                Atualize as informações do seu caderno.
            </p>
        </div>

        <form wire:submit.prevent="update" class="p-8 space-y-6">

            {{-- Nome --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Nome
                </label>

                <input type="text"
                    wire:model="nome"
                    class="w-full rounded-xl border border-gray-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 px-4 py-3 text-sm outline-none">

                @error('nome')
                    <span class="text-red-500 text-xs mt-2 block">{{ $message }}</span>
                @enderror
            </div>

            {{-- Banca --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Banca
                </label>

                <input type="text"
                    wire:model="banca"
                    class="w-full rounded-xl border border-gray-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 px-4 py-3 text-sm outline-none">

                @error('banca')
                    <span class="text-red-500 text-xs mt-2 block">{{ $message }}</span>
                @enderror
            </div>

            {{-- Data --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Data da Prova
                </label>

                <input type="date"
                    wire:model="data_prova"
                    class="w-full rounded-xl border border-gray-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 px-4 py-3 text-sm outline-none">

                @error('data_prova')
                    <span class="text-red-500 text-xs mt-2 block">{{ $message }}</span>
                @enderror
            </div>

            {{-- Botões --}}
            <div class="flex justify-end gap-4 pt-6 border-t border-gray-100">

                <a href="{{ route('cadernos.index') }}" wire:navigate
                    class="px-5 py-2.5 rounded-xl text-sm font-semibold text-gray-600 hover:bg-gray-100 transition">
                    Cancelar
                </a>

                <button type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold py-2.5 px-6 rounded-xl transition shadow-lg shadow-indigo-100">
                    Salvar Alterações
                </button>

            </div>

        </form>

    </div>
</div>
