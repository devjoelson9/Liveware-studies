<div class="min-h-screen bg-gray-100 p-4 flex justify-center items-start">
    <div class="bg-white p-8 sm:p-10 w-full max-w-lg mt-12 rounded-3xl shadow-md border border-gray-200">

        <h1 class="text-3xl font-extrabold text-gray-800 text-center mb-6">
            Minha Lista de Tarefas
        </h1>

        @if (session()->has('message'))
            <div class="mb-4 text-green-600 font-semibold text-center">
                {{ session('message') }}
            </div>
        @endif

        <ul>
            @foreach($tasks as $task)
                <li class="flex justify-between items-center py-3 px-3 bg-gray-50 hover:bg-gray-100 border-b border-gray-100 last:border-b-0 transition duration-150 rounded-xl">
                    <span class="text-gray-700 text-lg {{ $task->is_completed ? 'line-through text-gray-400' : '' }}">
                        {{ $task->description }}
                    </span>

                    <a href="{{ route('tarefas.edit', $task->id) }}"  class="text-blue-500 hover:text-blue-700 font-medium text-sm transition duration-150 hover:underline" wire:navigate>
                        Editar
                    </a>

                    <button wire:click="removeTask({{ $task->id }})"
                        class="text-red-500 hover:text-red-700 font-medium text-sm transition duration-150 hover:underline"
                    >
                        Remover
                    </button>
                </li>
            @endforeach
        </ul>

        <div class="flex mt-6">
            <a href="{{ route('tarefas.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-xl transition duration-300 transform hover:scale-[1.03] shadow-md hover:shadow-lg" wire:navigate>
                Cadastrar Tarefa
            </a>
        </div>
    </div>
</div>
