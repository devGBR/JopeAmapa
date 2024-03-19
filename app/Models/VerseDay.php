<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerseDay extends Model
{
    use HasFactory;

    protected $fillable = [
        'livro',
        'author',
        'group',
        'captulo',
        'versiculo',
        'img',
        'text'
    ];
}
