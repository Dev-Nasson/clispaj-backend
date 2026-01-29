<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void{

        Schema::create('testes', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->nullable();
            $table->string('category')->nullable();
            $table->string('seller')->nullable();
            $table->string('published')->nullable();
            $table->Integer('ratings')->nullable();
            $table->Integer('reviewCount')->nullable();
            $table->Integer('price')->nullable();
            $table->Integer('orders')->nullable();
            $table->Integer('stocks')->nullable();
            $table->Integer('revenue')->nullable();
            $table->string('sizes')->nullable();
            $table->string('colors')->nullable();
            $table->string('description')->nullable();
            $table->string('features')->nullable();
            $table->string('services')->nullable();
            $table->string('images')->nullable();
            $table->string('colorVariant')->nullable();
            $table->string('manufacture_name')->nullable();
            $table->string('manufacture_brand')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testes');
    }
};
