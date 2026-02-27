<?php

namespace App\Livewire\Disciplina;

use App\Models\CadernoEstudo;
use App\Models\Disciplina;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CadastroDisciplina extends Component
{
    public CadernoEstudo $caderno;

    public string $nome = '';

    protected $rules = [
        'nome' => 'required|string|min:3|max:255',
    ];

    public function mount(CadernoEstudo $caderno): void
    {
        if ($caderno->user_id !== Auth::id()) {
            abort(403);
        }

        $this->caderno = $caderno;
    }

    public function save()
    {
        $this->validate();

        Disciplina::query()->create([
            'caderno_estudo_id' => $this->caderno->id,
            'name' => $this->nome,
        ]);

        session()->flash('notify', 'Disciplina criada com sucesso!');
        return redirect()->route('disciplinas.index', $this->caderno->id);
    }

    public function render()
    {
        return view('livewire.cadastro-disciplina');
    }
}
