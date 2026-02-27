<?php

namespace App\Livewire\Disciplina;

use App\Models\Disciplina;
use Livewire\Component;

class ListaDisciplinas extends Component
{
    public function render()
    {
        $disc = Disciplina::all();
        return view('livewire.lista-disciplinas',[
            'disciplinas' => $disc,
        ]);
    }
}
