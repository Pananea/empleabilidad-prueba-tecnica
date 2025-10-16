<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Empresa;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     Empresa::insert([
            ['nombre' => 'Tech Solutions', 'direccion' => 'Calle 94-56', 'email' => 'contacto@techsolutions.com'],
            ['nombre' => 'Innovatech', 'direccion' => 'Avenida 45', 'email' => 'info@innovatech.com'],
            ['nombre' => 'GlobalSoft', 'direccion' => 'Carrera 7 #89-10', 'email' => 'hola@globalsoft.com'],
        ]); 
    }
}
