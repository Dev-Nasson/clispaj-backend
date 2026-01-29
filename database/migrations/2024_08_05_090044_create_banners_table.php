<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('imagem')->nullable();
            $table->string('tituloum')->nullable();
            $table->string('titulodois')->nullable();
            $table->string('titulotres')->nullable();
            $table->string('iconeum')->nullable();
            $table->string('iconedois')->nullable();
            $table->string('iconetres')->nullable();
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
        Schema::dropIfExists('banners');
    }
}
