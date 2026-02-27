<?php

namespace App\Livewire\Auth;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;


class Login extends Component
{
    public $email;
    public $password;

    #[Layout('layouts.auth')]
    public function render()
    {
        return view('livewire.auth.login');
    }

    public function login()
    {
        //dd($this->email, $this->password);
        $this->validate(
            [
                'email' => 'required|email',
                'password' => 'required|min:8',
            ],
            [
                'email.required' => 'O campo de email precisa ser preenchido!',
                'email.email' => 'Informe um email válido!',
                'password.required' => 'A senha é obrigatória!',
                'password.min' => 'A senha precisa no mínimo de 8 caracteres!',
            ]
        );

        if (Auth::attempt([
            'email' => $this->email,
            'password' => $this->password,
        ])) {
            return redirect()
                ->route('dashboard.index')
                ->with('toast', 'Login realizado com sucesso!');
        }

        $this->addError('email', 'Credenciais inválidas.');
    }
}
