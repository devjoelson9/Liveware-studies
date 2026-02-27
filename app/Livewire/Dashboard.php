<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Tarefa;
use Illuminate\Support\Facades\DB;

class Dashboard extends Component
{
    public function render()
    {
        $user = auth()->user();
        $stats = [
            'concluidas' => Tarefa::where('user_id', $user->id)
            ->where('is_completed', true)->count(),

            'pendentes' => Tarefa::where('user_id', $user->id)
            ->where('is_completed', false)->count(),
        ];

        $historico = Tarefa::where('user_id', $user->id)
        ->select(DB::raw('DATE(created_at) as data'), DB::raw('count(*) as total'))
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
