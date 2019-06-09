<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleImgPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_img_post', function (Blueprint $table) {
            $table->unsignedInteger('postID');
            $table->unsignedInteger('imgPostID');
            
            $table->foreign('postID')->references('postID')->on('publicacion');
            $table->foreign('imgPostID')->references('imgPostID')->on('imagenpost');
            
            $table->primary('postID', 'imgPostID');
            
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
        Schema::dropIfExists('detalle_img_post');
    }
}
