<?php

use App\Livewire\CadastroTarefas;
use App\Livewire\ListaTarefas;
use App\Livewire\Configuracoes;
use Illuminate\Support\Facades\Route;
use App\Livewire\EditarTarefa;
use App\Livewire\Dashboard;
use App\Livewire\ForgotPassword;
use App\Livewire\Login;
use App\Livewire\Register;
use App\Livewire\ResetPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Password;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard.index');
    Route::prefix('/tarefas')->group(function () {
        Route::get('/', ListaTarefas::class)->name('tarefas.index');
        Route::get('/cadastrar', CadastroTarefas::class)->name('tarefas.create');
        Route::get('/editar/{tarefa}', EditarTarefa::class)->name('tarefas.edit');
    });

    Route::get('/configuracoes', Configuracoes::class)->name('configuracoes');

    Route::post('/logout', function (Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    })->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::get('/email/verify', function () {
        return view('auth.verify-email');
    })->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect()->route('dashboard.index');
    })->middleware('signed')->name('verification.verify');

    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link sent!');
    })->middleware('throttle:6,1')->name('verification.send');
});

Route::middleware('guest')->group(function () {
    Route::get('/', Login::class)->name('login.auth');
    Route::get('/register', Register::class)->name('register.auth');
    Route::get('/forgot-password', ForgotPassword::class)->name('password.request');
    Route::get('/reset-password/{token}', ResetPassword::class)->name('password.reset');
});
