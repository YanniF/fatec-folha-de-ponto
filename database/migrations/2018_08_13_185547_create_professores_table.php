<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessoresTable extends Migration
{
  public function up()
  {
    Schema::create('professores', function (Blueprint $table) {
      $table->increments('id');
      $table->string('nome');
      $table->string('categoria');
      $table->string('projeto');
      $table->string('funcao');
      $table->string('curso');
      $table->string('carga');
      $table->string('dia');
      $table->string('entrada');
      $table->string('saida');
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::dropIfExists('professores');
  }
}
