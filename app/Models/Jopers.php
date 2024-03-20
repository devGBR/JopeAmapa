<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jopers extends Model
{
    use HasFactory;

   protected $fillable = [
    'user_id',
    'lider_ministerio',
    'convertido',
    'ministerio',
    'batizado',
    'celula',
   ];   
}
