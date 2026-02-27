<div wire:key="lista-cadernos-root" class="w-full flex justify-center py-12 bg-gray-50">

    <div class="bg-white w-full max-w-6xl rounded-3xl shadow-xl border border-gray-100 overflow-hidden">

        {{-- Cabeçalho --}}
        <div class="p-8 border-b border-gray-100 flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">
                    Meus Cadernos de Estudos
                </h1>
                <p class="text-sm text-gray-500 mt-1">
                    Organize suas áreas e acompanhe sua preparação.
                </p>
            </div>

            <a href="{{ route('cadernos.create') }}" wire:navigate
                class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold py-2.5 px-6 rounded-xl transition flex items-center gap-2 shadow-lg shadow-indigo-100">
                <span class="text-lg">+</span> Novo Caderno
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 text-gray-400 text-xs uppercase tracking-wider font-semibold">
                        <th class="px-8 py-4">Caderno</th>
                        <th class="px-8 py-4">Banca</th>
                        <th class="px-8 py-4 text-center">Data</th>
                        <th class="px-8 py-4 text-center">Disciplinas</th>
                        <th class="px-8 py-4 text-right">Ações</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100">
                    @forelse($cadernos as $caderno)
                    <tr wire:key="caderno-{{ $caderno->id }}"
                        class="hover:bg-indigo-50/40 transition-all duration-200">

                        {{-- Nome --}}
                        <td class="px-8 py-6">
                            <a href="{{ route('cadernos.show', $caderno->id) }}" wire:navigate
                                class="text-gray-800 font-semibold hover:text-indigo-600 transition">
                                {{ $caderno->nome }}
                            </a>

                            <div class="text-xs text-gray-400 mt-1">
                                Criado em {{ $caderno->created_at->format('d/m/Y') }}
                            </div>
                        </td>

                        {{-- Banca --}}
                        <td class="px-8 py-6">
                            @if($caderno->banca)
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-purple-100 text-purple-700">
                                    {{ $caderno->banca }}
                                </span>
                            @else
                                <span class="text-gray-400 text-sm">—</span>
                            @endif
                        </td>

                        {{-- Data --}}
                        <td class="px-8 py-6 text-center">
                            @if($caderno->data_prova)
                                @php
                                    $data = \Carbon\Carbon::parse($caderno->data_prova);
                                    $isPast = $data->isPast();
                                @endphp

                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium
                                    {{ $isPast
                                        ? 'bg-red-100 text-red-700'
                                        : 'bg-green-100 text-green-700' }}">
                                    {{ $data->format('d/m/Y') }}
                                </span>
                            @else
                                <span class="text-gray-400 text-sm">Não definida</span>
                            @endif
                        </td>

                        {{-- Contador disciplinas --}}
                        <td class="px-8 py-6 text-center">
                            <span class="text-sm font-semibold text-gray-700">
                                {{ $caderno->disciplinas_count ?? $caderno->disciplinas->count() }}
                            </span>
                        </td>

                        {{-- Ações --}}
                        <td class="px-8 py-6 text-right">
                            <div class="flex justify-end gap-2">

                                {{-- Abrir --}}
                                <a href="{{ route('cadernos.show', $caderno->id) }}" wire:navigate
                                    class="px-4 py-2 text-xs font-semibold text-indigo-600 bg-indigo-50 hover:bg-indigo-100 rounded-lg transition">
                                    Abrir
                                </a>

                                {{-- Editar --}}
                                <a href="{{ route('cadernos.edit', $caderno->id) }}" wire:navigate
                                    class="p-2 text-blue-600 hover:bg-blue-100 rounded-lg transition"
                                    title="Editar">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>

                                {{-- Excluir --}}
                                <button wire:click="delete({{ $caderno->id }})"
                                    wire:confirm="Tem certeza que deseja excluir este caderno?"
                                    class="p-2 text-red-500 hover:bg-red-100 rounded-lg transition"
                                    title="Excluir">
                                    <i class="fa-solid fa-trash"></i>
                                </button>

                            </div>
                        </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-8 py-20 text-center text-gray-500">

                            <div class="flex flex-col items-center gap-4">
                                <div class="text-5xl">📚</div>

                                <div>
                                    <p class="text-lg font-semibold text-gray-700">
                                        Você ainda não tem cadernos
                                    </p>
                                    <p class="text-sm text-gray-400 mt-1">
                                        Crie seu primeiro caderno e comece a organizar seus estudos.
                                    </p>
                                </div>

                                <a href="{{ route('cadernos.create') }}" wire:navigate
                                    class="mt-4 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold py-2.5 px-6 rounded-xl transition shadow-lg shadow-indigo-100">
                                    Criar Primeiro Caderno
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
