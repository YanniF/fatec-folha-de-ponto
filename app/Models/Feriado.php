<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feriado extends Model
{
  protected $table = 'feriados';
  protected $fillable = ['nome', 'data', 'informacao'];
}
