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
        Schema::create('certificados', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sacramento_id')->constrained('sacramentos')->onDelete('cascade');
            $table->string('numero_certificado', 50)->unique();
            $table->date('fecha_emision');
            $table->string('emitido_por', 150); // Nombre del usuario o párroco
            $table->string('observaciones', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Revierte las migraciones.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificados');
    }
};
