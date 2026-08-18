<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // ⚠️ Esta migración ya no agrega nada porque los campos existen.
        // Se deja vacía para evitar errores de duplicado.
    }

    public function down(): void
    {
        // Si querés revertir manualmente, podrías borrar las columnas,
        // pero lo dejamos vacío para no perder datos existentes.
    }
};
