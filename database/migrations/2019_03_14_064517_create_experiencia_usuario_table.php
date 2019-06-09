<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperienciaUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiencia_usuario', function (Blueprint $table) {
            $table->increments('expID');
            $table->string('detalle');
            $table->unsignedInteger('usuario');
            $table->foreign('usuario')->references('id')->on('users');
            $table->string('categoria', 5);
            $table->foreign('categoria')->references('categoriaID')->on('categoria_servicios');
            $table->timestamps();
            
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('experiencia_usuario');
    }
}
