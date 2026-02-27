<?php

namespace App\Livewire\Disciplina;

use App\Models\CadernoEstudo;
use App\Models\Disciplina;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DisciplinaShow extends Component
{
    public CadernoEstudo $caderno;
    public Disciplina $disciplina;

    public function mount(CadernoEstudo $caderno, Disciplina $disciplina): void
    {
        if ($caderno->user_id !== Auth::id()) {
            abort(403);
        }

        if ($disciplina->caderno_estudo_id !== $caderno->id) {
            abort(404);
        }

        $this->caderno = $caderno;
        $this->disciplina = $disciplina->loadCount('questoes');
    }

    public function render()
    {
        return view('livewire.disciplina-show');
    }
}
