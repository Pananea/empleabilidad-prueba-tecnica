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
        Schema::create('vacantes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('empresas')->onDelete('cascade');
            $table->string('titulo');
            $table->text('descripcion');
            $table->decimal('salario', 10, 2);
            $table->string('ciudad');
            $table->enum('nivel_educativo_minimo', ['bachillerato', 'técnico', 'tecnólogo', 'profesional']);
            $table->integer('experiencia_minima_años')->default(0);
            $table->integer('numero_vacantes')->default(1);
            $table->date('fecha_cierre');
            $table->enum('estado', ['publicada', 'cerrada'])->default('publicada');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacantes');
    }
};
