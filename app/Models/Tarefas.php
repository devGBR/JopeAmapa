<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefas extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'tarefa',
        'descricao',
        'user_id',
        'ministerio',
        'vencimento',
        'status',
        'ids_equipe'
    ];
}
