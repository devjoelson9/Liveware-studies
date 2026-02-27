<?php

namespace App\Livewire\Caderno;

use Livewire\Component;

class ListaCadernos extends Component
{
    public function render()
    {
        $cadernos = auth()->user()
            ->cadernos()
            ->withCount('disciplinas')
            ->latest()
            ->get();

        return view('livewire.lista-cadernos', [
            'cadernos' => $cadernos
        ]);
    }

    public function delete($id)
    {
        $caderno = auth()->user()
            ->cadernos()
            ->findOrFail($id);

        $caderno->delete();
        $this->dispatch('notify', message: 'Caderno excluido com sucesso!');
    }
}
