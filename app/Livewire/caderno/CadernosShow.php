<?php

namespace App\Livewire\Caderno;

use Livewire\Component;
use App\Models\CadernoEstudo;
use Illuminate\Support\Facades\Auth;

class CadernosShow extends Component
{
    public CadernoEstudo $caderno;

    public function mount(CadernoEstudo $caderno)
    {
        if ($caderno->user_id !== Auth::id()) {
            abort(403);
        }

        $this->caderno = $caderno->loadCount([
            'disciplinas',

        ])->load([
            'disciplinas',

        ]);
    }

    public function render()
    {
        return view('livewire.cadernos-show');
    }
}
