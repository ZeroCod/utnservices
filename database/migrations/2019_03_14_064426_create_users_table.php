<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 100);
            $table->string('paterno', 60);
            $table->string('materno', 60);
            $table->string('sexo', 1);
            $table->foreign('sexo')->references('genID')->on('genero');
            $table->date('nacimiento');
            $table->string('telefono', 10)->nullable();
            $table->string('email', 250)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('usuario',50)->unique();
            $table->string('password');
            $table->mediumInteger('sepoID')->unsigned();
            $table->foreign('sepoID')->references('id')->on('sepomex');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
