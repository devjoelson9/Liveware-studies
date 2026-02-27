<?php

namespace App\Livewire\Simulado;

use App\Models\CadernoEstudo;
use App\Models\Simulado;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SimuladoEdit extends Component
{
    public CadernoEstudo $caderno;
    public Simulado $simulado;

    public string $titulo = '';
    public string $observacoes = '';

    protected $rules = [
        'titulo' => 'required|string|min:3|max:255',
        'observacoes' => 'nullable|string|max:2000',
    ];

    public function mount(CadernoEstudo $caderno, Simulado $simulado): void
    {
        if ($caderno->user_id !== Auth::id()) {
            abort(403);
        }

        if ($simulado->user_id !== Auth::id() || $simulado->caderno_estudo_id !== $caderno->id) {
            abort(404);
        }

        $this->caderno = $caderno;
        $this->simulado = $simulado;

        $this->titulo = $simulado->titulo ?? 'Simulado';
        $this->observacoes = $simulado->observacoes ?? '';
    }

    public function update()
    {
        $this->validate();

        $this->simulado->update([
            'titulo' => $this->titulo,
            'observacoes' => $this->observacoes ?: null,
        ]);

        session()->flash('notify', 'Simulado atualizado com sucesso!');
        return redirect()->route('simulados.index', $this->caderno->id);
    }

    public function render()
    {
        return view('livewire.simulado.simulado-edit');
    }
}
