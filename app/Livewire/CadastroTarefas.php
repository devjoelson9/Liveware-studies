<?php

namespace App\Livewire;

use App\Models\Tarefa;
use Livewire\Component;

class CadastroTarefas extends Component
{
    public $description = '';
    public $isCompleted = false;

    public function render()
    {
        return view('livewire.cadastro-tarefas');
    }

    public function addTask()
    {
        $this->validate([
            'description' => 'required|min:3',
        ], [
            'description.required' => 'A descrição é obrigatória.',
            'description.min' => 'A descrição deve ter pelo menos 3 caracteres.',
        ]);

        Tarefa::create([
            'description' => $this->description,
            'is_completed' => (bool) $this->isCompleted,
        ]);

        $this->reset(['description', 'isCompleted']);

        session()->flash('message', 'Tarefa adicionada com sucesso!');
    }
}
