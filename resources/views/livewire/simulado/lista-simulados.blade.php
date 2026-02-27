<div class="w-full flex justify-center py-12 bg-gray-50">

    <div class="bg-white w-full max-w-6xl rounded-3xl shadow-xl border border-gray-100 overflow-hidden">

        <div class="p-8 border-b border-gray-100 flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Simulados</h1>
                <p class="text-sm text-gray-500 mt-1">
                    Caderno: <span class="font-semibold text-gray-700">{{ $this->caderno->nome }}</span>
                </p>
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ route('cadernos.show', $this->caderno->id) }}" wire:navigate
                    class="px-4 py-2.5 rounded-xl text-sm font-semibold text-gray-600 hover:bg-gray-100 transition">
                    Voltar
                </a>

                <a href="{{ route('simulados.create', $this->caderno->id) }}" wire:navigate
                    class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold py-2.5 px-6 rounded-xl transition flex items-center gap-2 shadow-lg shadow-indigo-100">
                    <span class="text-lg">+</span> Novo Simulado
                </a>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 text-gray-400 text-xs uppercase tracking-wider font-semibold">
                        <th class="px-8 py-4">Titulo</th>
                        <th class="px-8 py-4 text-center">Questoes</th>
                        <th class="px-8 py-4 text-center">Pontuacao</th>
                        <th class="px-8 py-4 text-center">Aproveitamento</th>
                        <th class="px-8 py-4 text-right">Acoes</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100">
                    @forelse($simulados as $simulado)
                    <tr wire:key="simulado-{{ $simulado->id }}" class="hover:bg-indigo-50/40 transition-all duration-200">
                        <td class="px-8 py-6">
                            <a href="{{ route('simulados.show', ['caderno' => $this->caderno->id, 'simulado' => $simulado->id]) }}" wire:navigate
                                class="text-gray-800 font-semibold hover:text-indigo-600 transition">
                                {{ $simulado->titulo ?: 'Simulado #' . $simulado->id }}
                            </a>
                            <div class="text-xs text-gray-400 mt-1">Criado em {{ $simulado->created_at?->format('d/m/Y') }}</div>
                        </td>

                        <td class="px-8 py-6 text-center text-sm font-semibold text-gray-700">{{ $simulado->total_questoes }}</td>
                        <td class="px-8 py-6 text-center text-sm font-semibold text-gray-700">{{ $simulado->pontuacao }}</td>
                        <td class="px-8 py-6 text-center text-sm font-semibold text-gray-700">
                            {{ $simulado->total_questoes > 0 ? number_format(($simulado->pontuacao / $simulado->total_questoes) * 100, 1) . '%' : '--' }}
                        </td>

                        <td class="px-8 py-6 text-right">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('simulados.show', ['caderno' => $this->caderno->id, 'simulado' => $simulado->id]) }}" wire:navigate
                                    class="px-4 py-2 text-xs font-semibold text-indigo-600 bg-indigo-50 hover:bg-indigo-100 rounded-lg transition">
                                    Abrir
                                </a>

                                <a href="{{ route('simulados.edit', ['caderno' => $this->caderno->id, 'simulado' => $simulado->id]) }}" wire:navigate
                                    class="p-2 text-blue-600 hover:bg-blue-100 rounded-lg transition" title="Editar">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>

                                <button wire:click="delete({{ $simulado->id }})"
                                    wire:confirm="Tem certeza que deseja excluir este simulado?"
                                    class="p-2 text-red-500 hover:bg-red-100 rounded-lg transition" title="Excluir">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-8 py-20 text-center text-gray-500">
                            <p class="text-lg font-semibold text-gray-700">Nenhum simulado cadastrado</p>
                            <p class="text-sm text-gray-400 mt-1">Crie seu primeiro simulado para acompanhar desempenho.</p>
                            <a href="{{ route('simulados.create', $this->caderno->id) }}" wire:navigate
                                class="mt-4 inline-flex bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold py-2.5 px-6 rounded-xl transition shadow-lg shadow-indigo-100">
                                Criar Primeiro Simulado
                            </a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>
