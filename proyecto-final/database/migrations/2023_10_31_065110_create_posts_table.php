<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * la migracion crea inicialmente a mi tabla,  y la pasa al factory
 */

return new class extends Migration
{

    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
        
            $table->string('identi');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('correo');
            $table->string('celular');
            $table->string('materia');
            $table->string('slug')->unique;
            
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};