<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Participante;

class ParticipanteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            Participante::create([
                'nombre' => "Participante $i",
                'email' => "participante$i@test.com",
                'telefono' => "3009544102$i",
            ]);
        }
    }
}
