<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

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
        $this->validate(
            [
                'email' => 'required|email',
                'password' => 'required|min:8'
            ],
            [
                'email.required' => 'O campo de email precisa ser preenchido!',
                'password.min' => 'A senha precisa no mínimo de 8 caracters'
            ]
        );


    }
}
