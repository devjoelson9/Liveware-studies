<?php

namespace App\Livewire\Caderno;

use App\Models\CadernoEstudo;
use Livewire\Component;

class CadastroCadernos extends Component
{
    public $nome;
    public $banca;
    public $data_prova;

    protected $rules = [
        'nome' => 'required|min:3',
        'banca' => 'nullable|string',
        'data_prova' => 'nullable|date'
    ];

    public function save()
    {
        $this->validate();

        CadernoEstudo::create([
            'user_id' => auth()->id(),
            'nome' => $this->nome,
            'banca' => $this->banca,
            'data_prova' => $this->data_prova,
        ]);

        session()->flash('notify', 'Caderno criado com sucesso!');
        return redirect()->route('cadernos.index');
    }

    public function render()
    {
        return view('livewire.cadastro-cadernos');
    }
}
