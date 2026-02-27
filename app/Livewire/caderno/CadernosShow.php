<?php

namespace App\Livewire\Caderno;

use Livewire\Component;
use App\Models\CadernoEstudo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

class CadernosShow extends Component
{
    public CadernoEstudo $caderno;
    public int $simuladosCount = 0;
    public bool $simuladosDisponivel = false;

    public function mount(CadernoEstudo $caderno)
    {
        if ($caderno->user_id !== Auth::id()) {
            abort(403);
        }

        $this->simuladosDisponivel = Schema::hasColumn('simulados', 'caderno_estudo_id');

        $this->caderno = $caderno->loadCount([
            'disciplinas',
        ])->load([
            'disciplinas',
        ]);

        if ($this->simuladosDisponivel) {
            $this->simuladosCount = (int) $caderno->simulados()->count();
        }
    }

    public function render()
    {
        return view('livewire.cadernos-show');
    }
}
