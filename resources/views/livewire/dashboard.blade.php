<div class="p-6 space-y-6">
    {{-- Cards de Resumo --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100">
            <p class="text-sm text-gray-500 font-medium">Total de Tarefas</p>
            <h3 class="text-3xl font-bold text-gray-800">{{ $stats['concluidas'] + $stats['pendentes'] }}</h3>
        </div>
        <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100">
            <p class="text-sm text-green-500 font-medium">Concluídas</p>
            <h3 class="text-3xl font-bold text-gray-800">{{ $stats['concluidas'] }}</h3>
        </div>
        <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100">
            <p class="text-sm text-amber-500 font-medium">Pendentes</p>
            <h3 class="text-3xl font-bold text-gray-800">{{ $stats['pendentes'] }}</h3>
        </div>
    </div>

    {{-- Área dos Gráficos --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

        {{-- Gráfico de Linha (Histórico) --}}
        <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100"
             x-data="{
                init() {
                    new Chart($refs.canvas, {
                        type: 'line',
                        data: {
                            labels: {{ json_encode($labels) }},
                            datasets: [{
                                label: 'Novas Tarefas',
                                data: {{ json_encode($valores) }},
                                borderColor: '#4f46e5',
                                tension: 0.4,
                                fill: true,
                                backgroundColor: 'rgba(79, 70, 229, 0.1)'
                            }]
                        },
                        options: { scales: { y: { beginAtZero: true } } }
                    })
                }
             }">
            <h4 class="text-lg font-semibold text-gray-700 mb-4">Produtividade Semanal</h4>
            <canvas x-ref="canvas"></canvas>
        </div>

        {{-- Gráfico de Pizza (Distribuição) --}}
        <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100"
             x-data="{
                init() {
                    new Chart($refs.canvasPie, {
                        type: 'doughnut',
                        data: {
                            labels: ['Concluídas', 'Pendentes'],
                            datasets: [{
                                data: [{{ $stats['concluidas'] }}, {{ $stats['pendentes'] }}],
                                backgroundColor: ['#10b981', '#f59e0b']
                            }]
                        }
                    })
                }
             }">
            <h4 class="text-lg font-semibold text-gray-700 mb-4">Distribuição de Status</h4>
            <div class="max-w-[250px] mx-auto">
                <canvas x-ref="canvasPie"></canvas>
            </div>
        </div>

    </div>
</div>

{{-- Scripts Necessários (Apenas uma vez no layout ou aqui) --}}
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endpush
