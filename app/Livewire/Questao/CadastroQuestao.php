<?php

namespace App\Livewire\Questao;

use App\Models\CadernoEstudo;
use App\Models\Disciplina;
use App\Models\Questao;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CadastroQuestao extends Component
{
    public CadernoEstudo $caderno;
    public Disciplina $disciplina;

    public string $enunciado = '';
    public string $alternativa_a = '';
    public string $alternativa_b = '';
    public string $alternativa_c = '';
    public string $alternativa_d = '';
    public string $alternativa_e = '';
    public string $alternativa_correta = 'a';

    protected $rules = [
        'enunciado' => 'required|string|min:5',
        'alternativa_a' => 'required|string|min:1',
        'alternativa_b' => 'required|string|min:1',
        'alternativa_c' => 'required|string|min:1',
        'alternativa_d' => 'required|string|min:1',
        'alternativa_e' => 'required|string|min:1',
        'alternativa_correta' => 'required|in:a,b,c,d,e',
    ];

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

    public function save()
    {
        $this->validate();

        Questao::query()->create([
            'disciplina_id' => $this->disciplina->id,
            'enunciado' => $this->enunciado,
            'alternativa_a' => $this->alternativa_a,
            'alternativa_b' => $this->alternativa_b,
            'alternativa_c' => $this->alternativa_c,
            'alternativa_d' => $this->alternativa_d,
            'alternativa_e' => $this->alternativa_e,
            'alternativa_correta' => $this->alternativa_correta,
        ]);

        session()->flash('notify', 'Questao cadastrada com sucesso!');
        return redirect()->route('questoes.index', [
            'caderno' => $this->caderno->id,
            'disciplina' => $this->disciplina->id,
        ]);
    }

    public function render()
    {
        return view('livewire.questao.cadastro-questao');
    }
}
