<div wire:key="lista-disciplinas-root" class="w-full flex justify-center py-12 bg-gray-50">

    <div class="bg-white w-full max-w-6xl rounded-3xl shadow-xl border border-gray-100 overflow-hidden">

        <div class="p-8 border-b border-gray-100 flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">
                    Disciplinas
                </h1>
                <p class="text-sm text-gray-500 mt-1">
                    Caderno: <span class="font-semibold text-gray-700">{{ $this->caderno->nome }}</span>
                </p>
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ route('cadernos.show', $this->caderno->id) }}" wire:navigate
                    class="px-4 py-2.5 rounded-xl text-sm font-semibold text-gray-600 hover:bg-gray-100 transition">
                    Voltar
                </a>

                <a href="{{ route('disciplinas.create', $this->caderno->id) }}" wire:navigate
                    class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold py-2.5 px-6 rounded-xl transition flex items-center gap-2 shadow-lg shadow-indigo-100">
                    <span class="text-lg">+</span> Nova Disciplina
                </a>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 text-gray-400 text-xs uppercase tracking-wider font-semibold">
                        <th class="px-8 py-4">Disciplina</th>
                        <th class="px-8 py-4 text-center">Criada em</th>
                        <th class="px-8 py-4 text-right">Ações</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100">
                    @forelse($disciplinas as $disciplina)
                    <tr wire:key="disciplina-{{ $disciplina->id }}" class="hover:bg-indigo-50/40 transition-all duration-200">
                        <td class="px-8 py-6">
                            <a href="{{ route('disciplinas.show', ['caderno' => $this->caderno->id, 'disciplina' => $disciplina->id]) }}" wire:navigate
                                class="text-gray-800 font-semibold hover:text-indigo-600 transition">
                                {{ $disciplina->nome ?? $disciplina->name }}
                            </a>
                        </td>

                        <td class="px-8 py-6 text-center text-sm text-gray-600">
                            {{ $disciplina->created_at?->format('d/m/Y') }}
                        </td>

                        <td class="px-8 py-6 text-right">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('disciplinas.show', ['caderno' => $this->caderno->id, 'disciplina' => $disciplina->id]) }}" wire:navigate
                                    class="px-4 py-2 text-xs font-semibold text-indigo-600 bg-indigo-50 hover:bg-indigo-100 rounded-lg transition">
                                    Abrir
                                </a>

                                <a href="{{ route('disciplinas.edit', ['caderno' => $this->caderno->id, 'disciplina' => $disciplina->id]) }}" wire:navigate
                                    class="p-2 text-blue-600 hover:bg-blue-100 rounded-lg transition"
                                    title="Editar">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>

                                <button wire:click="delete({{ $disciplina->id }})"
                                    wire:confirm="Tem certeza que deseja excluir esta disciplina?"
                                    class="p-2 text-red-500 hover:bg-red-100 rounded-lg transition"
                                    title="Excluir">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="px-8 py-20 text-center text-gray-500">
                            <div class="flex flex-col items-center gap-4">
                                <div>
                                    <p class="text-lg font-semibold text-gray-700">
                                        Nenhuma disciplina cadastrada
                                    </p>
                                    <p class="text-sm text-gray-400 mt-1">
                                        Crie a primeira disciplina deste caderno para começar.
                                    </p>
                                </div>

                                <a href="{{ route('disciplinas.create', $this->caderno->id) }}" wire:navigate
                                    class="mt-4 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold py-2.5 px-6 rounded-xl transition shadow-lg shadow-indigo-100">
                                    Criar Primeira Disciplina
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>
