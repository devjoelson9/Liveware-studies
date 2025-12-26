<div class="max-w-2xl mx-auto bg-white shadow-lg rounded-2xl p-6 mt-10">
    <h1 class="text-2xl font-bold text-indigo-700 mb-6 text-center">
        Cadastre uma nova tarefa
    </h1>

    <div class="space-y-5">
        <div class="flex flex-col">
            <label class="text-gray-700 font-medium mb-1">Descrição da tarefa</label>
            <input
                type="text"
                wire:model="description"
                placeholder="Adicione a descrição da tarefa"
                class="p-3 border-2 border-indigo-300 focus:border-indigo-500 rounded-xl text-gray-700 placeholder-gray-400 focus:ring-2 focus:ring-indigo-500 transition duration-150"
            >
        </div>

        <div class="flex items-center space-x-3">
            <label class="text-gray-700 font-medium">Completa?</label>
            <input
                type="radio"
                wire:model="isCompleted"
                class="text-indigo-600 focus:ring-indigo-500 h-5 w-5"
            >
        </div>

        <div class="flex justify-between">
            <button
                wire:click="addTask"
                class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 px-6 rounded-xl transition duration-300 transform hover:scale-[1.03] shadow-md hover:shadow-lg focus:ring-4 focus:ring-indigo-300"
            >
                Adicionar
            </button>
            <a href="{{ route('tarefas.index') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-xl transition duration-300 transform hover:scale-[1.03] shadow-md hover:shadow-lg" wire:navigate>
                Lista de Tarefas
            </a>
        </div>
    </div>
</div>
