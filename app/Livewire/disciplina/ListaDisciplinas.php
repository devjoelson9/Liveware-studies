<?php

namespace App\Livewire\Disciplina;

use App\Models\CadernoEstudo;
use App\Models\Disciplina;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ListaDisciplinas extends Component
{
    public CadernoEstudo $caderno;

    public function mount(CadernoEstudo $caderno): void
    {
        if ($caderno->user_id !== Auth::id()) {
            abort(403);
        }

        $this->caderno = $caderno;
    }

    public function render()
    {
        $disciplinas = Disciplina::query()
            ->where('caderno_estudo_id', $this->caderno->id)
            ->latest()
            ->get();

        return view('livewire.lista-disciplinas', [
            'disciplinas' => $disciplinas,
        ]);
    }

    public function delete(int $id): void
    {
        Disciplina::query()
            ->where('id', $id)
            ->where('caderno_estudo_id', $this->caderno->id)
            ->delete();

        $this->dispatch('notify', message: 'Disciplina excluida com sucesso!');
    }
}
