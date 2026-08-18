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
        Schema::create('usuarios_parroquias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_completo', 150);
            $table->string('email', 120)->unique();
            $table->string('password');
            $table->string('telefono', 30)->nullable();
            $table->string('rol', 50)->default('secretario'); // admin, párroco, secretario, etc.
            $table->string('parroquia_nombre', 150);
            $table->string('direccion', 200)->nullable();
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Revierte las migraciones.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios_parroquias');
    }
};
