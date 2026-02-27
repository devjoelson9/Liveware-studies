<?php

namespace App\Livewire\Simulado;

use App\Models\CadernoEstudo;
use App\Models\Questao;
use App\Models\Simulado;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CadastroSimulado extends Component
{
    public CadernoEstudo $caderno;

    public string $titulo = '';
    public string $observacoes = '';
    public array $questoesSelecionadas = [];

    protected $rules = [
        'titulo' => 'required|string|min:3|max:255',
        'observacoes' => 'nullable|string|max:2000',
        'questoesSelecionadas' => 'required|array|min:1',
        'questoesSelecionadas.*' => 'integer|exists:questoes,id',
    ];

    public function mount(CadernoEstudo $caderno): void
    {
        if ($caderno->user_id !== Auth::id()) {
            abort(403);
        }

        $this->caderno = $caderno;
    }

    public function save()
    {
        $this->validate();

        $idsValidos = Questao::query()
            ->whereIn('disciplina_id', $this->caderno->disciplinas()->pluck('id'))
            ->whereIn('id', $this->questoesSelecionadas)
            ->pluck('id')
            ->all();

        if (count($idsValidos) === 0) {
            $this->addError('questoesSelecionadas', 'Selecione ao menos uma questao valida.');
            return;
        }

        $simulado = Simulado::query()->create([
            'user_id' => Auth::id(),
            'caderno_estudo_id' => $this->caderno->id,
            'titulo' => $this->titulo,
            'observacoes' => $this->observacoes ?: null,
            'total_questoes' => count($idsValidos),
            'pontuacao' => 0,
        ]);

        $ordem = 1;
        foreach ($idsValidos as $questaoId) {
            $simulado->questoes()->attach($questaoId, ['ordem' => $ordem]);
            $ordem++;
        }

        session()->flash('notify', 'Simulado criado com sucesso!');
        return redirect()->route('simulados.index', $this->caderno->id);
    }

    public function render()
    {
        $questoes = Questao::query()
            ->whereIn('disciplina_id', $this->caderno->disciplinas()->pluck('id'))
            ->with('disciplina:id,name')
            ->latest()
            ->get();

        return view('livewire.simulado.cadastro-simulado', [
            'questoes' => $questoes,
        ]);
    }
}
