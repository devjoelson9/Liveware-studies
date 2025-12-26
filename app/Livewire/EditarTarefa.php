<?php

namespace App\Livewire;

use App\Models\Tarefa;
use Livewire\Component;

class EditarTarefa extends Component
{
    public $taskId;
    public $description;
    public $is_completed;

    public function render()
    {
        return view('livewire.editar-tarefa');
    }

    public function mount($tarefa)
    {
        $task = Tarefa::findOrFail($tarefa);

        $this->taskId = $task->id;
        $this->description = $task->description;
        $this->is_completed = $task->is_completed;
    }

    public function updateTask()
    {
        /*  $this->validate([
        'description' => 'required|min:3',
    ],
    [

        'description.min' => 'A descrição deve ter pelo menos 3 caracteres.',
    ]); */

        $this->validate(
            [
                'description' => 'required|min:3',
            ],
            [
                'description.required' => 'o campo descrição é obrigatório!',
                'description.min' => 'o campo descrição precisa no minimo 3 caracters!'
            ]
        );

        $task = Tarefa::findOrFail($this->taskId);

        $task->update([
            'description' => $this->description,
            'is_completed' => (bool) $this->is_completed,
        ]);

        session()->flash('toast', 'Tarefa atualizada com sucesso!');

        return $this->redirectRoute('tarefas.index', navigate: true);
    }
}
