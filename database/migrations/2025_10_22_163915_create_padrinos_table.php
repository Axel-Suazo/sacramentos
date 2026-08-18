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
        Schema::create('padrinos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sacramento_id')->constrained('sacramentos')->onDelete('cascade');
            $table->string('nombre_completo', 150);
            $table->string('tipo', 20)->comment('padrino o madrina');
            $table->string('telefono', 30)->nullable();
            $table->string('direccion', 150)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Revierte las migraciones.
     */
    public function down(): void
    {
        Schema::dropIfExists('padrinos');
    }
};
