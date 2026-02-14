<main class="flex-1 flex justify-center px-6 py-1">

    <div class="bg-white w-full max-w-2xl p-8 rounded-3xl shadow-xl h-fit">
        <h1 class="text-3xl font-bold text-gray-800 text-center mb-6">
            Editar Tarefa
        </h1>

        <form wire:submit.prevent="updateTask" class="space-y-6">
            <div>
                <label class="block text-gray-700 font-medium mb-1">
                    Nome da tarefa
                </label>

                <input type="text" wire:model="name"
                    placeholder="Atualize o nome"
                    class="w-full p-3 rounded-xl border @error('name') border-red-500 @else border-blue-500 @enderror
                           focus:outline-none focus:ring-2 focus:ring-blue-600
                           focus:border-transparent transition">

                @error('name')
                    <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">
                    Descrição da tarefa
                </label>

                <textarea
                    wire:model="description"
                    placeholder="Atualize a descrição"
                    class="w-full p-3 rounded-xl border @error('description') border-red-500 @else border-blue-500 @enderror
                           focus:outline-none focus:ring-2 focus:ring-blue-600
                           focus:border-transparent transition"
                    rows="5"
                ></textarea>

                @error('description')
                    <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex items-center gap-3 p-2 bg-gray-50 rounded-xl">
                <input
                    type="checkbox"
                    id="is_completed"
                    wire:model="is_completed"
                    class="h-5 w-5 text-blue-600 focus:ring-blue-500 rounded border-gray-300 transition cursor-pointer"
                >
                <label for="is_completed" class="text-gray-700 font-medium cursor-pointer select-none">
                    Tarefa concluída
                </label>
            </div>

            <div class="flex items-center justify-between pt-6 border-t border-gray-100">

                <a href="{{ route('tarefas.index') }}"
                   wire:navigate
                   class="bg-gray-200 hover:bg-gray-300 text-gray-700
                          font-medium py-3 px-6 rounded-xl transition">
                    Voltar
                </a>

                <button
                    type="submit"
                    wire:loading.attr="disabled"
                    wire:target="updateTask"
                    class="bg-blue-500 hover:bg-blue-600 text-white
                           font-semibold py-3 px-6 rounded-xl
                           transition transform active:scale-95
                           shadow-md hover:shadow-lg disabled:opacity-50">

                    <span wire:loading.remove wire:target="updateTask">Atualizar</span>
                    <span wire:loading wire:target="updateTask">Salvando...</span>
                </button>
            </div>

        </form>
    </div>
</main>
