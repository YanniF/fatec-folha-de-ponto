<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
  protected $table = 'professores';
  protected $fillable = ['nome', 'categoria', 'projeto', 'funcao', 'curso', 'carga', 'dia', 'entrada', 'saida'];
}
