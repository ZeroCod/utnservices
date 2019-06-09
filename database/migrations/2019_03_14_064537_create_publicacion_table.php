<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublicacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publicacion', function (Blueprint $table) {
            $table->increments('postID');
            $table->string('titulo', 60);
            $table->string('descripcion');
            $table->string('incluye');
            $table->string('no_incluye');
            
            $table->unsignedInteger('usuario');
            $table->foreign('usuario')->references('id')->on('users');
            
            $table->string('categoriaServ', 5);
            $table->foreign('categoriaServ')->references('categoriaID')->on('categoria_servicios');
            
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
        Schema::dropIfExists('publicacion');
    }
}
