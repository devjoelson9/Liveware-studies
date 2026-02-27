<?php

namespace App\Livewire\Simulado;

use App\Models\CadernoEstudo;
use App\Models\Simulado;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SimuladoShow extends Component
{
    public CadernoEstudo $caderno;
    public Simulado $simulado;

    public function mount(CadernoEstudo $caderno, Simulado $simulado): void
    {
        if ($caderno->user_id !== Auth::id()) {
            abort(403);
        }

        if ($simulado->user_id !== Auth::id() || $simulado->caderno_estudo_id !== $caderno->id) {
            abort(404);
        }

        $this->caderno = $caderno;
        $this->simulado = $simulado->load(['questoes.disciplina', 'respostas'])->loadCount('respostas');
    }

    public function render()
    {
        return view('livewire.simulado.simulado-show');
    }
}
