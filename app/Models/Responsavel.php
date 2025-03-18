<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Responsavel extends Model
{
    /// use HasFactory;

    // Indicar o nome da tabela
    protected $table = 'responsaveis';

    // Indicar quais colunas podem ser cadastrada
    protected $fillable = ['responsavel'];
}