<?php

namespace App\Livewire;

use App\Models\Tarefa;
use Livewire\Component;

class ListaTarefas extends Component
{
    public $tasks;

    public function render()
    {
        return view('livewire.lista-tarefas');
    }

    // Carrega as tarefas ao montar o componente
    public function mount()
    {
        $this->loadTasks();
    }

    // Função para recarregar a lista
    public function loadTasks()
    {
        $this->tasks = Tarefa::latest()->get();
    }

    // Remove a tarefa do banco de dados
    public function removeTask($id)
    {
        $task = Tarefa::find($id);

        if ($task) {
            $task->delete();
            session()->flash('message', 'Tarefa removida com sucesso!');
        }

        // Atualiza a lista
        $this->loadTasks();
    }
}
