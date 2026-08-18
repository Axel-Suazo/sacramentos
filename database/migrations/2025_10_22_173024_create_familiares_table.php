<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ejecuta las migraciones.
     */
    public function up(): void
    {
        Schema::create('familiares', function (Blueprint $table) {
            $table->id();
            $table->foreignId('persona_id')->constrained('personas')->onDelete('cascade');
            $table->string('nombre_completo', 150);
            $table->enum('parentesco', ['Padre', 'Madre', 'Tutor']);
            $table->string('telefono', 20)->nullable();
            $table->string('direccion', 200)->nullable();
            $table->string('correo', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Revierte las migraciones.
     */
    public function down(): void
    {
        Schema::dropIfExists('familiares');
    }
};
