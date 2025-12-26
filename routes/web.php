<?php

use App\Livewire\CadastroTarefas;
use App\Livewire\ListaTarefas;
use Illuminate\Support\Facades\Route;
use App\Livewire\EditarTarefa;
use App\Livewire\Dashboard;
use App\Livewire\Login;

Route::get('/', Dashboard::class)->name('dashboard.index');

Route::get('/tarefas', ListaTarefas::class)->name('tarefas.index');

Route::get('/cadastrar', CadastroTarefas::class)->name('tarefas.create');

Route::get('/editar/{tarefa}', EditarTarefa::class)->name('tarefas.edit');

Route::get('/login', Login::class)->name('login.auth');
