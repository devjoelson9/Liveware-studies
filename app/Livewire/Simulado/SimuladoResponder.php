<?php

namespace App\Livewire\Simulado;

use App\Models\CadernoEstudo;
use App\Models\RespostaSimulado;
use App\Models\Simulado;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SimuladoResponder extends Component
{
    public CadernoEstudo $caderno;
    public Simulado $simulado;

    public array $respostas = [];

    public function mount(CadernoEstudo $caderno, Simulado $simulado): void
    {
        if ($caderno->user_id !== Auth::id()) {
            abort(403);
        }

        if ($simulado->user_id !== Auth::id() || $simulado->caderno_estudo_id !== $caderno->id) {
            abort(404);
        }

        $this->caderno = $caderno;
        $this->simulado = $simulado->load(['questoes', 'respostas']);

        foreach ($this->simulado->respostas as $resposta) {
            $this->respostas[$resposta->questao_id] = $resposta->alternativa_marcada;
        }
    }

    public function finalizar()
    {
        $questoes = $this->simulado->questoes;

        $pontuacao = 0;

        RespostaSimulado::query()
            ->where('simulado_id', $this->simulado->id)
            ->delete();

        foreach ($questoes as $questao) {
            $marcada = $this->respostas[$questao->id] ?? '';
            $correta = $marcada !== '' && strtolower($marcada) === strtolower($questao->alternativa_correta);

            if ($correta) {
                $pontuacao++;
            }

            RespostaSimulado::query()->create([
                'simulado_id' => $this->simulado->id,
                'questao_id' => $questao->id,
                'alternativa_marcada' => $marcada,
                'correta' => $correta,
            ]);
        }

        $this->simulado->update([
            'total_questoes' => $questoes->count(),
            'pontuacao' => $pontuacao,
        ]);

        session()->flash('notify', 'Simulado finalizado! Pontuacao: ' . $pontuacao . '/' . $questoes->count());
        return redirect()->route('simulados.show', [
            'caderno' => $this->caderno->id,
            'simulado' => $this->simulado->id,
        ]);
    }

    public function render()
    {
        return view('livewire.simulado.simulado-responder');
    }
}
