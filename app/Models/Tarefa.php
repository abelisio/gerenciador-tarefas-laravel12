<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tarefa extends Model
{
    use HasFactory;

    // Indicar o nome da tabela
    protected $table = 'tarefas';

    // Indicar quais colunas podem ser cadastrada
    protected $fillable = ['titulo', 'descricao', 'responsavel', 'prioridade', 'deadline', 'status'];
}
