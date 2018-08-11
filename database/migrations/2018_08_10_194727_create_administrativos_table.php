<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdministrativosTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('administrativos', function (Blueprint $table) {
      $table->increments('id');
      $table->string('nome');
      $table->string('rg');
      $table->string('cargo');
      $table->string('jornada');
      $table->string('horario');
      $table->string('intervalo');
      $table->boolean('plantao')->default(false);
      $table->boolean('estudante')->default(false);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('administrativos');
  }
}
