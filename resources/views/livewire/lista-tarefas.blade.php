<div wire:key="lista-tarefas-root" class="w-full flex justify-center py-10">

    <div class="bg-white w-full max-w-4xl rounded-3xl shadow-xl border border-gray-100 overflow-hidden">

        {{-- Cabeçalho da Seção --}}
        <div class="p-8 border-b border-gray-50 flex justify-between items-center bg-white">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Minhas Tarefas</h1>
                <p class="text-sm text-gray-500">Gerencie suas atividades diárias</p>
            </div>
            <a href="{{ route('tarefas.create') }}" wire:navigate
                class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold py-2.5 px-5 rounded-xl transition flex items-center gap-2 shadow-lg shadow-indigo-100">
                <span>+</span> Nova Tarefa
            </a>
        </div>

        {{-- Tabela --}}
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 text-gray-400 text-xs uppercase tracking-wider font-semibold">
                        <th class="px-8 py-4">Tarefa</th>
                        <th class="px-8 py-4">Vencimento</th>
                        <th class="px-8 py-4 text-center">Status</th>
                        <th class="px-8 py-4 text-right">Ações</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($tasks as $task)
                    <tr wire:key="task-{{ $task->id }}" class="hover:bg-blue-50/30 transition-colors group">
                        <td class="px-8 py-5">
                            <div class="flex flex-col">
                                <span
                                    class="text-gray-700 font-medium {{ $task->is_completed ? 'line-through text-gray-400' : '' }}">
                                    {{ $task->name }}
                                </span>
                                @if($task->description)
                                <span class="text-xs text-gray-400 truncate max-w-xs">{{ $task->description }}</span>
                                @endif
                            </div>
                        </td>

                        <td class="px-8 py-5">
                            <div class="flex flex-col">
                                <span>
                                    {{$task->expiration_date}}
                                </span>
                            </div>
                        </td>

                        <td class="px-8 py-5 text-center">
                            @if($task->is_completed)
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                Concluída
                            </span>
                            @else
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-amber-100 text-amber-800">
                                Pendente
                            </span>
                            @endif
                        </td>

                        <td class="px-8 py-5 text-right">
                            <div class="flex justify-end gap-3">
                                <a href="{{ route('tarefas.edit', $task->id) }}" wire:navigate
                                    class="p-2 text-blue-600 hover:bg-blue-100 rounded-lg transition" title="Editar">
                                    <i class="fa-solid fa-pencil"></i>

                                </a>

                                <button wire:click="removeTask({{ $task->id }})"
                                    wire:confirm="Tem certeza que deseja excluir esta tarefa?"
                                    class="p-2 text-red-500 hover:bg-red-100 rounded-lg transition" title="Excluir">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="px-8 py-12 text-center text-gray-500">
                            <div class="flex flex-col items-center">
                                <p>Nenhuma tarefa encontrada. Comece criando uma!</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>


    </div>
</div>
