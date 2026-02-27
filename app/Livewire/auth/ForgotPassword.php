<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ForgotPassword extends Component
{
    public string $email = '';

    #[Layout('layouts.auth')]
    public function render()
    {
        return view('livewire.auth.forgot-password');
    }

    public function forgot(){

        $this->validate(
            ['email' => 'required|email']
        );

        $status = Password::sendResetLink(
            ['email' => $this->email]
        );

        return $status === Password::ResetLinkSent
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }
}
