<?php

namespace Tests\Feature;

use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Livewire\Livewire;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_usuario_pode_ser_criado()
    {
        $this->usuarioPadrao();

        $this->assertDatabaseHas('users', [
            'email' => 'joelson@teste.com'
        ]);
    }

    public function test_nao_pode_criar_usuario_com_email_duplicado()
    {
        $this->usuarioPadrao();

        Livewire::test(Register::class)
            ->set('email', 'joelson@teste.com')
            ->call('register')
            ->assertHasErrors(['email' => 'unique']);
    }

    public function test_usuario_criado_com_sucesso()
    {
        Livewire::test(Register::class)
            ->set('email', 'joelson@teste.com')
            ->set('name', 'joelson')
            ->set('password', '12345678')
            ->call('register')
            ->assertHasNoErrors();

        $this->assertDatabaseHas('users', [
            'email' => 'joelson@teste.com',
            'name' => 'joelson'
        ]);

        $user = User::where('email', 'joelson@teste.com')->first();

        $this->assertTrue(
            Hash::check('12345678', $user->password)
        );
    }

    public function test_usuario_pode_fazer_login()
    {
        $this->usuarioPadrao();

        Livewire::test(Login::class)
            ->set('email', 'joelson@teste.com')
            ->set('password', '12345678')
            ->call('login')
            ->assertHasNoErrors()
            ->assertRedirect(route('dashboard.index'));

            $this->assertAuthenticated();
    }

    public function test_usuario_pode_fazer_logout()
    {
       $user = User::factory()->create();

        $this->actingAs($user);

        $this->post('/logout');

        $this->assertGuest();
    }

    public function test_login_com_email_inexistente()
    {
        $this->usuarioPadrao();

        Livewire::test(Login::class)
            ->set('email', 'teste@gmail.com')
            ->set('password', '12345678')
            ->call('login')
            ->assertHasErrors(['email']);

        $this->assertGuest();
    }

    public function test_login_com_senha_errada()
    {
        $this->usuarioPadrao();

        Livewire::test(Login::class)
            ->set('email', 'joelson@teste.com')
            ->set('password', '1234567jo')
            ->call('login')
            ->assertHasErrors(['email']);

        $this->assertGuest();
    }

    public function test_login_redireciona_para_dashboard()
    {
        $this->usuarioPadrao();

        Livewire::test(Login::class)
            ->set('email', 'joelson@teste.com')
            ->set('password', '12345678')
            ->call('login')
            ->assertHasNoErrors()
            ->assertRedirect(route('dashboard.index'));

        $this->assertAuthenticated();
    }

    private function usuarioPadrao(){
        return User::factory()->create([
            'email' => 'joelson@teste.com',
            'password' => Hash::make('12345678'),
        ]);
    }
}
