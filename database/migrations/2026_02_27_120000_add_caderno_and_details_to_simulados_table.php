<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('simulados', function (Blueprint $table) {
            $table->unsignedBigInteger('caderno_estudo_id')->nullable()->index();
            $table->string('titulo')->default('Simulado');
            $table->text('observacoes')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('simulados', function (Blueprint $table) {
            $table->dropColumn(['caderno_estudo_id', 'titulo', 'observacoes']);
        });
    }
};
