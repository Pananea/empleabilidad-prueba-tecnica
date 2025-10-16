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
        Schema::create('postulacions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('participante_id')->constrained('participantes')->onDelete('cascade');
            $table->foreignId('vacante_id')->constrained('vacantes')->onDelete('cascade');
            $table->timestamp('fecha_postulacion')->useCurrent();
            $table->enum('estado', ['postulado', 'rechazado', 'aceptado'])->default('postulado');
            $table->integer('puntaje')->default(0);
            $table->timestamps();
            $table->unique(['participante_id', 'vacante_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('postulacions');
    }
};
