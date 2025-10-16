<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Participante extends Model
{
    use HasFactory;

    protected $table = 'participantes';

    protected $fillable = [
        'numero_documento',
        'nombres',
        'apellidos',
        'email',
        'telefono',
        'fecha_nacimiento',
        'ciudad',
        'nivel_educativo',
        'anos_experiencia',
        'es_joven',
        'estado',
    ];

    protected $attributes = [
        'estado' => 'activo',
    ];

    protected static function booted()
    {
        static::saving(function ($participante) {
            $edad = Carbon::parse($participante->fecha_nacimiento)->age;
            $participante->es_joven = $edad < 29;
        });
    }
}
