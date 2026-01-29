<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){

        Schema::create('contactos', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->nullable();
            $table->string('imail')->nullable();
            $table->string('numero')->nullable();
            $table->string('assunto')->nullable();
            $table->string('status')->nullable();
            $table->text('descricao')->nullable();
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
        Schema::dropIfExists('contactos');
    }
}
