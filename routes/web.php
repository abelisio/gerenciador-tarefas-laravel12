<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ResponsavelController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TarefaController;
use App\Models\Responsavel;

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/listar', [tarefaController::class, 'index'])->name('tarefas.index');
Route::get('/tarefas/create', [tarefaController::class, 'create'])->name(name: 'tarefas.create');
Route::get('/tarefas{tarefa}', [tarefaController::class, 'show'])->name('tarefas.show');

Route::get('/create-responsavel', [ResponsavelController::class, 'create'])->name(name: 'responsavel.create');


Route::get('/tarefas/{id}/edit', [TarefaController::class, 'edit'])->name('tarefas.edit');
Route::put('/tarefas/{tarefa}', [TarefaController::class, 'update'])->name('tarefas.update');

Route::delete('/{id}', [TarefaController::class, 'destroy'])->name('tarefas.destroy');