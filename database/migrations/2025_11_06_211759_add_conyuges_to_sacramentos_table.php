<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('sacramentos', function (Blueprint $table) {
            $table->string('conyuge1')->nullable()->after('partida');
            $table->string('conyuge2')->nullable()->after('conyuge1');
        });
    }

    public function down(): void
    {
        Schema::table('sacramentos', function (Blueprint $table) {
            $table->dropColumn(['conyuge1', 'conyuge2']);
        });
    }
};
