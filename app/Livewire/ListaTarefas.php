<?php

namespace App\Livewire;

use App\Models\Tarefa;
use Livewire\Component;
use Livewire\WithPagination;

class ListaTarefas extends Component
{
    use WithPagination;

    public function removeTask($taskId)
    {
        Tarefa::findOrFail($taskId)->delete();

        $this->dispatch('notify', message: 'Tarefa removida com sucesso!');
    }

    public function render()
    {
        $user = Auth()->user();

        $tasks = Tarefa::where('user_id', $user->id)->get();
        //$tasks = Tarefa::all();

        return view('livewire.lista-tarefas', [
            'tasks' => $tasks,
        ]);
    }
}
