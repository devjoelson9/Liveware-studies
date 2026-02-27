<?php

namespace Tests\Feature;

use App\Livewire\Questao\CadastroQuestao;
use App\Livewire\Questao\QuestaoEdit;
use App\Models\CadernoEstudo;
use App\Models\Disciplina;
use App\Models\Questao;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class QuestaoTest extends TestCase
{
    use RefreshDatabase;

    public function test_usuario_pode_cadastrar_questao_na_disciplina(): void
    {
        $user = User::factory()->create();
        $caderno = CadernoEstudo::query()->create([
            'user_id' => $user->id,
            'nome' => 'Concurso TRE',
        ]);
        $disciplina = Disciplina::query()->create([
            'caderno_estudo_id' => $caderno->id,
            'name' => 'Português',
        ]);

        $this->actingAs($user);

        Livewire::test(CadastroQuestao::class, ['caderno' => $caderno, 'disciplina' => $disciplina])
            ->set('enunciado', 'Qual e a alternativa correta?')
            ->set('alternativa_a', 'A')
            ->set('alternativa_b', 'B')
            ->set('alternativa_c', 'C')
            ->set('alternativa_d', 'D')
            ->set('alternativa_e', 'E')
            ->set('alternativa_correta', 'a')
            ->call('save')
            ->assertHasNoErrors();

        $this->assertDatabaseHas('questoes', [
            'disciplina_id' => $disciplina->id,
            'enunciado' => 'Qual e a alternativa correta?',
            'alternativa_correta' => 'a',
        ]);
    }

    public function test_usuario_pode_editar_questao_na_disciplina(): void
    {
        $user = User::factory()->create();
        $caderno = CadernoEstudo::query()->create([
            'user_id' => $user->id,
            'nome' => 'Concurso TRE',
        ]);
        $disciplina = Disciplina::query()->create([
            'caderno_estudo_id' => $caderno->id,
            'name' => 'Português',
        ]);
        $questao = Questao::query()->create([
            'disciplina_id' => $disciplina->id,
            'enunciado' => 'Enunciado original',
            'alternativa_a' => 'A',
            'alternativa_b' => 'B',
            'alternativa_c' => 'C',
            'alternativa_d' => 'D',
            'alternativa_e' => 'E',
            'alternativa_correta' => 'a',
        ]);

        $this->actingAs($user);

        Livewire::test(QuestaoEdit::class, ['caderno' => $caderno, 'disciplina' => $disciplina, 'questao' => $questao])
            ->set('enunciado', 'Enunciado atualizado')
            ->set('alternativa_correta', 'b')
            ->call('update')
            ->assertHasNoErrors();

        $this->assertDatabaseHas('questoes', [
            'id' => $questao->id,
            'enunciado' => 'Enunciado atualizado',
            'alternativa_correta' => 'b',
        ]);
    }
}
