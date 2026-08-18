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
        Schema::create('sacramentos', function (Blueprint $table) {
            $table->id();

            // Relaciones
            $table->foreignId('persona_id')->constrained('personas')->onDelete('cascade');
            $table->foreignId('sacramento_tipo_id')->constrained('sacramento_tipos')->onDelete('cascade');

            // Datos del sacramento
            $table->date('fecha_sacramento')->nullable();
            $table->string('lugar', 150)->nullable();
            $table->string('parroquia', 150)->nullable();
            $table->string('ministro', 120)->nullable();
            $table->text('notas')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Revierte las migraciones.
     */
    public function down(): void
    {
        Schema::dropIfExists('sacramentos');
    }
};
