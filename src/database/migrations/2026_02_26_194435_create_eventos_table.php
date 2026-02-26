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
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion');
            $table->string('provincia');
            $table->string('localidad');
            $table->string('tipo_terreno');
            $table->dateTime('fecha');
            $table->string('tipo_evento');
            $table->foreignId('anfitrion_id')->constrained('users')->onDelete('cascade');
            $table->string('imagen')->nullable();
            $table->boolean('aprobado')->default(false); // Aprobación del admin
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
};
