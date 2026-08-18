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
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string('nombres', 120);
            $table->string('apellidos', 120);
            $table->string('documento_unico', 50)->unique();
            $table->date('fecha_nacimiento')->nullable();
            $table->string('lugar_nacimiento', 120)->nullable();
            $table->string('telefono', 30)->nullable();
            $table->string('email', 120)->nullable()->index();
            $table->string('direccion', 180)->nullable();
            $table->timestamps();

            $table->index(['apellidos', 'nombres']);
        });
    }

    /**
     * Revierte las migraciones.
     */
    public function down(): void
    {
        Schema::dropIfExists('personas');
    }
};
