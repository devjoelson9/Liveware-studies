<?php

namespace App\Livewire;

use App\Models\Tarefa;
use Livewire\Component;

class CadastroTarefas extends Component
{
    public $name;
    public $description;
    public $isCompleted = false;
    public $expiration_date;

    public function render()
    {
        return view('livewire.cadastro-tarefas');
    }

    public function addTask()
    {
        $this->validate([
            'name' => 'required',
            'description' => 'required|min:3',
        ], [
            'name.required' => 'O nome é obrigatória.',
            'description.required' => 'A descrição é obrigatória.',
            'description.min' => 'A descrição deve ter pelo menos 3 caracteres.',
        ]);

        Tarefa::create([
            'name' => $this->name,
            'description' => $this->description,
            'is_completed' => (bool) $this->isCompleted,
            'user_id' => auth()->id(),
            'expiration_date' => $this->expiration_date,
        ]);

        $this->reset(['name', 'description', 'isCompleted', 'expiration_date']);

        $this->dispatch('notify', message: 'Tarefa cadastrada com sucesso!');
    }
}
