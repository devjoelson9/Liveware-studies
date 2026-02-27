<?php

namespace App\Livewire\Disciplina;

use App\Models\CadernoEstudo;
use App\Models\Disciplina;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DisciplinaEdit extends Component
{
    public CadernoEstudo $caderno;
    public Disciplina $disciplina;

    public string $nome = '';

    protected $rules = [
        'nome' => 'required|string|min:3|max:255',
    ];

    public function mount(CadernoEstudo $caderno, Disciplina $disciplina): void
    {
        if ($caderno->user_id !== Auth::id()) {
            abort(403);
        }

        if ($disciplina->caderno_estudo_id !== $caderno->id) {
            abort(404);
        }

        $this->caderno = $caderno;
        $this->disciplina = $disciplina;
        $this->nome = $disciplina->nome ?? $disciplina->name;
    }

    public function update()
    {
        $this->validate();

        $this->disciplina->update([
            'name' => $this->nome,
        ]);

        session()->flash('notify', 'Disciplina atualizada com sucesso!');
        return redirect()->route('disciplinas.index', $this->caderno->id);
    }

    public function render()
    {
        return view('livewire.disciplina-edit');
    }
}
