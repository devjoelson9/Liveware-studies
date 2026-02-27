<?php

namespace App\Livewire\Simulado;

use App\Models\CadernoEstudo;
use App\Models\Simulado;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ListaSimulados extends Component
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
        $simulados = Simulado::query()
            ->where('user_id', Auth::id())
            ->where('caderno_estudo_id', $this->caderno->id)
            ->latest()
            ->get();

        return view('livewire.simulado.lista-simulados', [
            'simulados' => $simulados,
        ]);
    }

    public function delete(int $id): void
    {
        Simulado::query()
            ->where('id', $id)
            ->where('user_id', Auth::id())
            ->where('caderno_estudo_id', $this->caderno->id)
            ->delete();

        $this->dispatch('notify', message: 'Simulado excluido com sucesso!');
    }
}
