<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vacante;

class VacanteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 8; $i++) {
            Vacante::create([
                'titulo' => "Vacante $i",
                'descripcion' => "Descripción de la vacante $i",
                'empresa_id' => rand(1,3), // se asigna a cualquiera de las 3 empresas
            ]);
        }
    }
}
