<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 30);
            $table->string('email', 30)->unique();
            $table->unsignedBigInteger('quarto_id');
            $table->dateTime('periodo_de');
            $table->dateTime('periodo_ate');
            $table->timestamps();

            $table->foreign('quarto_id')->references('id')->on('quartos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
