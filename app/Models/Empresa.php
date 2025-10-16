<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nit',
        'nombre_empresa',
        'email',
        'telefono',
        'ciudad',
        'estado',
    ];

    protected $attributes = [
        'estado' => 'activa',
    ];

    public function vacantes()
    {
        return $this->hasMany(Vacante::class, 'company_id');
    }
}

