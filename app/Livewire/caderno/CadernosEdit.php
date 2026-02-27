<?php

namespace App\Livewire\Caderno;

use Livewire\Component;
use App\Models\CadernoEstudo;

class CadernosEdit extends Component
{
    public CadernoEstudo $caderno;

    public $nome;
    public $banca;
    public $data_prova;

    protected $rules = [
        'nome' => 'required|min:3',
        'banca' => 'nullable|string',
        'data_prova' => 'nullable|date'
    ];

    public function mount(CadernoEstudo $caderno)
    {
        // 🔒 Segurança multiusuário
        if ($caderno->user_id !== auth()->id()) {
            abort(403);
        }

        $this->caderno = $caderno;

        // Preencher formulário
        $this->nome = $caderno->nome;
        $this->banca = $caderno->banca;
        $this->data_prova = $caderno->data_prova;
    }

    public function update()
    {
        $this->validate();

        $this->caderno->update([
            'nome' => $this->nome,
            'banca' => $this->banca,
            'data_prova' => $this->data_prova,
        ]);

        return redirect()->route('cadernos.index');
    }

    public function render()
    {
        return view('livewire.cadernos-edit');
    }
}
