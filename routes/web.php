<?php

use App\Livewire\CadastroTarefas;
use App\Livewire\ListaTarefas;
use App\Livewire\Configuracoes;
use Illuminate\Support\Facades\Route;
use App\Livewire\EditarTarefa;
use App\Livewire\Dashboard;
use App\Livewire\Auth\ForgotPassword;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\ResetPassword;
use App\Livewire\Auth\VerifyEmail;
use App\Livewire\Disciplina\CadastroDisciplina;
use App\Livewire\Caderno\CadastroCadernos;
use App\Livewire\Caderno\ListaCadernos;
use App\Livewire\Caderno\CadernosEdit;
use App\Livewire\Caderno\CadernosShow;
use App\Livewire\Disciplina\DisciplinaEdit;
use App\Livewire\Disciplina\DisciplinaShow;
use App\Livewire\Disciplina\ListaDisciplinas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard.index');

    Route::prefix('/tarefas')->group(function () {
        Route::get('/', ListaTarefas::class)->name('tarefas.index');
        Route::get('/cadastrar', CadastroTarefas::class)->name('tarefas.create');
        Route::get('/editar/{tarefa}', EditarTarefa::class)->name('tarefas.edit');
    });

    Route::get('/configuracoes', Configuracoes::class)->name('configuracoes');

    Route::prefix('/cadernos')->group(function(){
        Route::get('/', ListaCadernos::class)->name('cadernos.index');
        Route::get('/create', CadastroCadernos::class)->name('cadernos.create');
        Route::get('/{caderno}', CadernosShow::class)->name('cadernos.show');
        Route::get('/{caderno}/edit', CadernosEdit::class)->name('cadernos.edit');

        Route::prefix('/{caderno}/disciplinas')->group(function(){
            Route::get('/', ListaDisciplinas::class)->name('disciplinas.index');
            Route::get('/create', CadastroDisciplina::class)->name('disciplinas.create');
            Route::get('/{disciplina}', DisciplinaShow::class)->name('disciplinas.show');
            Route::get('/{disciplina}/edit', DisciplinaEdit::class)->name('disciplinas.edit');
        });
    });

    Route::post('/logout', function (Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    })->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::get('/email/verify', VerifyEmail::class)->name('verification.notice');

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
