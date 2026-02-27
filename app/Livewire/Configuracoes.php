<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class Configuracoes extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $delete_password;

    public function mount()
    {
        $user = auth()->user();
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function updateProfile()
    {
        $user = auth()->user();

        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        ]);

        $user->update($validated);

        $this->dispatch('notify', message: 'Perfil atualizado com sucesso!');
    }

    public function updatePassword()
    {
        $this->validate([
            'password' => ['required', 'confirmed', Password::min(8)],
        ]);

        auth()->user()->update([
            'password' => Hash::make($this->password),
        ]);

        $this->reset(['password', 'password_confirmation']);

        $this->dispatch('notify', message: 'Senha alterada com sucesso!');
    }

    public function render()
    {
        return view('livewire.configuracoes');
    }

    public function deleteAccount()
    {
        $this->validate([
            'delete_password' => ['required', 'string'],
        ]);

        $user = auth()->user();

        if (! Hash::check($this->delete_password, $user->password)) {
            $this->addError('delete_password', 'Senha incorreta.');
            return;
        }

        Auth::logout();
        $user->delete();

        if (request()->hasSession()) {
            request()->session()->invalidate();
            request()->session()->regenerateToken();
        }

        return redirect()->route('login.auth')->with('notify', 'Conta excluida com sucesso.');
    }
}
