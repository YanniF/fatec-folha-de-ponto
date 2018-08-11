<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Administrativo extends Model
{
  protected $table = 'administrativos';
  protected $fillable = ['nome', 'rg', 'cargo', 'jornada', 'horario', 'intervalo', 'plantao', 'estudante'];
}
