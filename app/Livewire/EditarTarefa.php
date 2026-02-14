<?php
namespace App\Livewire;

use App\Models\Tarefa;
use Livewire\Component;

class EditarTarefa extends Component
{
    public Tarefa $task;

    public string $description;
    public bool $is_completed;
    public $name;

    public function mount($tarefa)
    {
        $this->task = Tarefa::findOrFail($tarefa);

        $this->name = $this->task->name;
        $this->description = $this->task->description;
        $this->is_completed = (bool) $this->task->is_completed;
    }

    public function updateTask()
    {
        $this->validate([
            'name' => 'required|min:3',
            'description' => 'required|min:3',
        ]);

        $this->task->update([
            'name' => $this->name,
            'description' => $this->description,
            'is_completed' => $this->is_completed,
        ]);

        $this->dispatch('notify', message: 'Tarefa atualizada com sucesso!');

        return $this->redirectRoute('tarefas.index', navigate: true);
    }

    public function render()
    {
        return view('livewire.editar-tarefa');
    }
}
