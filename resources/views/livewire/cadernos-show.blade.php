<div class="w-full flex justify-center py-14 bg-gradient-to-br from-gray-50 to-gray-100">

    <div class="bg-white w-full max-w-6xl rounded-3xl shadow-2xl border border-gray-200 overflow-hidden">

        {{-- HEADER --}}
        <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-6 p-10 border-b bg-white">

            <div>
                <h1 class="text-3xl font-bold text-gray-800">
                    {{ $caderno->nome }}
                </h1>

                <p class="text-sm text-gray-500 mt-2">
                    {{ $caderno->banca ?? 'Sem banca definida' }}
                </p>
            </div>

            <div class="flex items-center gap-4">

                <a href="{{ route('cadernos.index') }}"
                   wire:navigate
                   class="text-sm text-gray-600 hover:text-indigo-600 transition">
                    ← Voltar
                </a>

            </div>
        </div>

        {{-- ESTATÍSTICAS --}}
        <div class="grid md:grid-cols-4 gap-6 p-10 bg-gray-50">

            {{-- Data da Prova --}}
            <div class="bg-white rounded-2xl p-6 shadow-sm border hover:shadow-md transition">
                <p class="text-xs text-gray-500 uppercase tracking-wide">Data da Prova</p>
                <p class="mt-2 text-xl font-semibold text-indigo-600">
                    {{ $caderno->data_prova
                        ? \Carbon\Carbon::parse($caderno->data_prova)->format('d/m/Y')
                        : 'Não definida' }}
                </p>
            </div>

            {{-- Dias Restantes --}}
            <div class="bg-white rounded-2xl p-6 shadow-sm border hover:shadow-md transition">
                <p class="text-xs text-gray-500 uppercase tracking-wide">Dias Restantes</p>
                <p class="mt-2 text-xl font-semibold text-red-600">
                    {{ $caderno->data_prova
                        ? now()->diffInDays($caderno->data_prova, false) . ' dias'
                        : '—' }}
                </p>
            </div>

            {{-- Total Disciplinas --}}
            <div class="bg-white rounded-2xl p-6 shadow-sm border hover:shadow-md transition">
                <p class="text-xs text-gray-500 uppercase tracking-wide">Disciplinas</p>
                <p class="mt-2 text-xl font-semibold text-green-600">
                    {{ $caderno->disciplinas_count }}

                </p>
            </div>

            {{-- Total Simulados --}}
            <div class="bg-white rounded-2xl p-6 shadow-sm border hover:shadow-md transition">
                <p class="text-xs text-gray-500 uppercase tracking-wide">Simulados</p>
                <p class="mt-2 text-xl font-semibold text-purple-600">
0
                </p>
            </div>

        </div>

        {{-- MÓDULOS --}}
        <div class="p-10">

            <h2 class="text-xl font-bold text-gray-800 mb-8">
                Módulos do Caderno
            </h2>

            <div class="grid md:grid-cols-2 gap-8">

                {{-- DISCIPLINAS --}}
                <a href="{{ route('disciplinas.index', $caderno->id) }}"
                   wire:navigate
                   class="relative bg-white rounded-3xl p-8 shadow-sm border hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">

                    <div class="flex items-center gap-4">

                        <div class="w-14 h-14 bg-indigo-100 text-indigo-600 rounded-2xl flex items-center justify-center text-2xl">
                            📚
                        </div>

                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 group-hover:text-indigo-600 transition">
                                Disciplinas
                            </h3>
                            <p class="text-sm text-gray-500">
                                Gerencie conteúdos e tópicos.
                            </p>
                        </div>
                    </div>

                    <div class="mt-6 flex justify-between items-center">
                        <span class="text-sm font-medium text-gray-500">
                           {{ $caderno->disciplinas_count }} cadastradas
                        </span>

                        <span class="text-indigo-600 font-medium">
                            Acessar →
                        </span>
                    </div>

                </a>

                {{-- SIMULADOS --}}
                <a href="#"
                   class="relative bg-white rounded-3xl p-8 shadow-sm border hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">

                    <div class="flex items-center gap-4">

                        <div class="w-14 h-14 bg-purple-100 text-purple-600 rounded-2xl flex items-center justify-center text-2xl">
                            📝
                        </div>

                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 group-hover:text-purple-600 transition">
                                Simulados
                            </h3>
                            <p class="text-sm text-gray-500">
                                Crie e acompanhe seus simulados.
                            </p>
                        </div>
                    </div>

                    <div class="mt-6 flex justify-between items-center">
                        <span class="text-sm font-medium text-gray-500">
                            Em breve
                        </span>

                        <span class="text-purple-600 font-medium">
                            →
                        </span>
                    </div>

                </a>

            </div>

        </div>

    </div>

</div>
