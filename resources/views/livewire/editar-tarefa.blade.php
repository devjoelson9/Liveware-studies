<div class="min-h-screen bg-gray-100 flex justify-center items-start p-6">
    <x-sidebar/>
    <div class="bg-white p-8 rounded-3xl shadow-2xl w-full max-w-lg mt-12 border border-gray-200">

        <h1 class="text-3xl font-extrabold text-gray-800 text-center mb-6">
            Editar Tarefa
        </h1>

        @if (session()->has('message'))
            <div class="mb-4 text-green-600 font-semibold text-center">
                {{ session('message') }}
            </div>
        @endif


        <form wire:submit.prevent="updateTask" class="space-y-6">
            <div>
                <label class="block text-gray-700 font-medium mb-1">
                    Descrição da tarefa
                </label>
                <input
                    type="text"
                    wire:model="description"
                    placeholder="Atualize a descrição"
                    class="w-full p-3 border-2 border-indigo-300 focus:border-indigo-500 rounded-xl text-gray-700 placeholder-gray-400 focus:ring-2 focus:ring-indigo-500 transition duration-150"
                >
                @error('description')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex items-center space-x-3">
                <label class="text-gray-700 font-medium">Completa?</label>
                <input
                    type="checkbox"
                    wire:model="is_completed"
                    class="h-5 w-5 text-indigo-600 focus:ring-indigo-500 rounded"
                >
            </div>

            <div class="flex justify-between mt-6">
                <a href="{{ route('dashboard.index') }}"
                   class="bg-gray-300 hover:bg-gray-400 text-gray-700 font-semibold py-3 px-6 rounded-xl transition duration-300" wire:navigate>
                    Voltar
                </a>

                <button type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 px-6 rounded-xl transition duration-300 transform hover:scale-[1.03] shadow-md hover:shadow-lg">
                    Atualizar
                </button>
            </div>
        </form>
    </div>
</div>
