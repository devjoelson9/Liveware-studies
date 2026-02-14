<div wire:key="cadastrar-tarefa-root" class="max-w-2xl mx-auto bg-white shadow-2xl rounded-3xl p-8 mt-12 border border-indigo-50">
    <div class="text-center mb-8">
        <h1 class="text-3xl font-extrabold text-gray-800 tracking-tight">
            Nova Tarefa
        </h1>
        <p class="text-gray-500">Organize seu dia preenchendo os detalhes abaixo.</p>
    </div>

    <form wire:submit="addTask" class="space-y-5">
        <div class="flex flex-col">
            <label class="text-sm font-semibold text-gray-600 mb-1 ml-1">Título da Tarefa</label>
            <input type="text" wire:model="name"
                class="p-3.5 border-2 border-gray-100 bg-gray-50 rounded-2xl focus:border-indigo-500 focus:bg-white focus:ring-0 transition-all duration-200 outline-none">
            @error('name') <span class="text-red-500 text-xs mt-1 ml-1">{{ $message }}</span> @enderror
        </div>

        <div class="flex flex-col">
            <label class="text-sm font-semibold text-gray-600 mb-1 ml-1">Descrição Detalhada</label>
            <textarea wire:model="description" placeholder="Descreva o que precisa ser feito..."
                class="p-3.5 border-2 border-gray-100 bg-gray-50 rounded-2xl focus:border-indigo-500 focus:bg-white focus:ring-0 transition-all duration-200 outline-none resize-none"
                rows="4"></textarea>
            @error('description') <span class="text-red-500 text-xs mt-1 ml-1">{{ $message }}</span> @enderror
        </div>

        <div class="flex flex-col">
            <label class="text-sm font-semibold text-gray-600 mb-1 ml-1">Prazo de Entrega</label>
            <div class="relative">
                <input type="date" wire:model="expiration_date"
                    class="w-full p-3.5 border-2 border-gray-100 bg-gray-50 rounded-2xl focus:border-indigo-500 focus:bg-white focus:ring-0 transition-all duration-200 outline-none text-gray-600">
                <div class="absolute inset-y-0 right-4 flex items-center pointer-events-none text-gray-400">
                    <svg xmlns="http://www.w3.org" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
            </div>
            @error('expiration_date') <span class="text-red-500 text-xs mt-1 ml-1">{{ $message }}</span> @enderror
        </div>

        <div class="flex items-center gap-4 pt-4">
            <button type="submit"
                class="flex-1 bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-4 px-6 rounded-2xl shadow-lg shadow-indigo-200 transition-all transform active:scale-95">
                Criar Tarefa
            </button>

            <a wire:navigate href="{{ route('tarefas.index') }}"
                class="bg-white border-2 border-gray-100 hover:border-indigo-100 hover:bg-indigo-50 text-gray-500 hover:text-indigo-600 font-semibold py-4 px-6 rounded-2xl transition-all">
                Cancelar
            </a>
        </div>
    </form>
</div>
