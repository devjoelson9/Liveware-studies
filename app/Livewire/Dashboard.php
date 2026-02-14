<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Tarefa;
use Illuminate\Support\Facades\DB;

class Dashboard extends Component
{
    public function render()
    {
        // Exemplo: Contagem de tarefas por status
        $stats = [
            'concluidas' => Tarefa::where('is_completed', true)->count(),
            'pendentes' => Tarefa::where('is_completed', false)->count(),
        ];

        // Exemplo: Tarefas criadas nos últimos 7 dias (para o gráfico de linha)
        $historico = Tarefa::select(DB::raw('DATE(created_at) as data'), DB::raw('count(*) as total'))
            ->groupBy('data')
            ->orderBy('data', 'asc')
            ->take(7)
            ->get();

        return view('livewire.dashboard', [
            'labels' => $historico->pluck('data'),
            'valores' => $historico->pluck('total'),
            'stats' => $stats
        ]);
    }
}
