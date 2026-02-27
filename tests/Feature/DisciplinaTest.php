<?php

namespace Tests\Feature;

use App\Livewire\Disciplina\CadastroDisciplina;
use App\Livewire\Disciplina\DisciplinaEdit;
use App\Models\CadernoEstudo;
use App\Models\Disciplina;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class DisciplinaTest extends TestCase
{
    use RefreshDatabase;

    public function test_usuario_pode_cadastrar_disciplina_no_caderno(): void
    {
        $user = User::factory()->create();
        $caderno = CadernoEstudo::query()->create([
            'user_id' => $user->id,
            'nome' => 'Concurso TJ',
        ]);

        $this->actingAs($user);

        Livewire::test(CadastroDisciplina::class, ['caderno' => $caderno])
            ->set('nome', 'Direito Constitucional')
            ->call('save')
            ->assertHasNoErrors()
            ->assertRedirect(route('disciplinas.index', $caderno->id));

        $this->assertDatabaseHas('disciplinas', [
            'caderno_estudo_id' => $caderno->id,
            'name' => 'Direito Constitucional',
        ]);
    }

    public function test_usuario_pode_editar_disciplina_no_caderno(): void
    {
        $user = User::factory()->create();
        $caderno = CadernoEstudo::query()->create([
            'user_id' => $user->id,
            'nome' => 'Concurso TJ',
        ]);

        $disciplina = Disciplina::query()->create([
            'caderno_estudo_id' => $caderno->id,
            'name' => 'Direito Penal',
        ]);

        $this->actingAs($user);

        Livewire::test(DisciplinaEdit::class, ['caderno' => $caderno, 'disciplina' => $disciplina])
            ->set('nome', 'Direito Administrativo')
            ->call('update')
            ->assertHasNoErrors()
            ->assertRedirect(route('disciplinas.index', $caderno->id));

        $this->assertDatabaseHas('disciplinas', [
            'id' => $disciplina->id,
            'caderno_estudo_id' => $caderno->id,
            'name' => 'Direito Administrativo',
        ]);
    }
}
