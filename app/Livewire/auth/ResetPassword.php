<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ResetPassword extends Component
{
    public string $token = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    public function mount($token){
        $this->token = $token;
        $this->email = request()->query('email');
    }

    #[Layout('layouts.auth')]
    public function render()
    {
        return view('livewire.auth.reset-password');
    }

    public function resetPassword(){
        $this->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            ['email' => $this->email,
             'password' => $this->password,
             'password_confirmation' => $this->password_confirmation,
             'token' => $this->token
            ],
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PasswordReset
            ? redirect()->route('login.auth')->with('notify', 'Senha redefinida com sucesso!')
            : back()->withErrors(['email' => [__($status)]]);
    }
}
