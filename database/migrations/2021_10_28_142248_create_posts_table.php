<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned(); //esta columna se va a relacionar con la tabla categories, 
            //cuando un registro tenga un 1 en category_id, va a hacer referencia a deportes,
            //cuando un registro tenga un 2 en category_id, va a hacer referencia a finanzas. 
            $table->text('title');
            $table->text('sumary');
            $table->text('image');
            $table->text('description');
            $table->text('author');
            $table->timestamps();
        });
        //A la accion de $table->integer('category_id')->unsigned(); se lo vamos a indicar a laravel
        //llamando a Schema - es un metodo estatico, vamos a relacionar la tabla categories con la columna category_id
        Schema::table('posts', function(Blueprint $table){//esta funcion propia de laravel,
            //tabla->posts col->category_id sera referente a la columna id de la tabla->categories
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
