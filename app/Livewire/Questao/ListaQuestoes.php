<?php

namespace App\Livewire\Questao;

use App\Models\CadernoEstudo;
use App\Models\Disciplina;
use App\Models\Questao;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ListaQuestoes extends Component
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
        $this->disciplina = $disciplina;
    }

    public function render()
    {
        $questoes = Questao::query()
            ->where('disciplina_id', $this->disciplina->id)
            ->latest()
            ->get();

        return view('livewire.questao.lista-questoes', [
            'questoes' => $questoes,
        ]);
    }

    public function delete(int $id): void
    {
        Questao::query()
            ->where('id', $id)
            ->where('disciplina_id', $this->disciplina->id)
            ->delete();

        $this->dispatch('notify', message: 'Questao excluida com sucesso!');
    }
}
