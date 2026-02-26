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
        Schema::create('especies', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('nombre_cientifico');
            $table->string('clima');
            $table->string('region_origen');
            $table->string('tiempo_adultez');
            $table->text('beneficios_descripcion');
            $table->string('foto')->nullable();
            $table->string('enlace_wiki')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('especies');
    }
};
