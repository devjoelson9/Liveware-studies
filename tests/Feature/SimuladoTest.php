<?php

namespace Tests\Feature;

use App\Livewire\Simulado\CadastroSimulado;
use App\Livewire\Simulado\ListaSimulados;
use App\Livewire\Simulado\SimuladoEdit;
use App\Models\CadernoEstudo;
use App\Models\Disciplina;
use App\Models\Questao;
use App\Models\Simulado;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class SimuladoTest extends TestCase
{
    use RefreshDatabase;

    public function test_usuario_pode_cadastrar_simulado_no_caderno(): void
    {
        $user = User::factory()->create();
        $caderno = CadernoEstudo::query()->create([
            'user_id' => $user->id,
            'nome' => 'Concurso TRT',
        ]);
        $disciplina = Disciplina::query()->create([
            'caderno_estudo_id' => $caderno->id,
            'name' => 'Direito Constitucional',
        ]);
        $questao = Questao::query()->create([
            'disciplina_id' => $disciplina->id,
            'enunciado' => 'Qual alternativa esta correta?',
            'alternativa_a' => 'A',
            'alternativa_b' => 'B',
            'alternativa_c' => 'C',
            'alternativa_d' => 'D',
            'alternativa_e' => 'E',
            'alternativa_correta' => 'a',
        ]);

        $this->actingAs($user);

        Livewire::test(CadastroSimulado::class, ['caderno' => $caderno])
            ->set('titulo', 'Simulado 01')
            ->set('questoesSelecionadas', [$questao->id])
            ->set('observacoes', 'Primeira tentativa')
            ->call('save')
            ->assertHasNoErrors()
            ->assertRedirect(route('simulados.index', $caderno->id));

        $this->assertDatabaseHas('simulados', [
            'user_id' => $user->id,
            'caderno_estudo_id' => $caderno->id,
            'titulo' => 'Simulado 01',
            'total_questoes' => 1,
            'pontuacao' => 0,
        ]);
    }

    public function test_usuario_pode_editar_simulado_no_caderno(): void
    {
        $user = User::factory()->create();
        $caderno = CadernoEstudo::query()->create([
            'user_id' => $user->id,
            'nome' => 'Concurso TRT',
        ]);

        $simulado = Simulado::query()->create([
            'user_id' => $user->id,
            'caderno_estudo_id' => $caderno->id,
            'titulo' => 'Simulado 01',
            'total_questoes' => 50,
            'pontuacao' => 30,
        ]);

        $this->actingAs($user);

        Livewire::test(SimuladoEdit::class, ['caderno' => $caderno, 'simulado' => $simulado])
            ->set('titulo', 'Simulado 01 - Revisado')
            ->call('update')
            ->assertHasNoErrors()
            ->assertRedirect(route('simulados.index', $caderno->id));

        $this->assertDatabaseHas('simulados', [
            'id' => $simulado->id,
            'titulo' => 'Simulado 01 - Revisado',
        ]);
    }

    public function test_usuario_pode_excluir_simulado_da_lista(): void
    {
        $user = User::factory()->create();
        $caderno = CadernoEstudo::query()->create([
            'user_id' => $user->id,
            'nome' => 'Concurso TRT',
        ]);

        $simulado = Simulado::query()->create([
            'user_id' => $user->id,
            'caderno_estudo_id' => $caderno->id,
            'titulo' => 'Simulado para excluir',
            'total_questoes' => 30,
            'pontuacao' => 20,
        ]);

        $this->actingAs($user);

        Livewire::test(ListaSimulados::class, ['caderno' => $caderno])
            ->call('delete', $simulado->id)
            ->assertHasNoErrors();

        $this->assertDatabaseMissing('simulados', [
            'id' => $simulado->id,
        ]);
    }

}
