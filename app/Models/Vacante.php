<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Vacante extends Model
{
     use HasFactory;

    protected $table = 'vacantes';

    protected $fillable = [
        'company_id',
        'titulo',
        'descripcion',
        'salario',
        'ciudad',
        'nivel_educativo_minimo',
        'experiencia_minima_anos',
        'numero_vacantes',
        'fecha_cierre',
        'estado',
    ];

    protected $attributes = [
        'estado' => 'publicada',
        'numero_vacantes' => 1,
    ];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'company_id');
    }
    
    public function getEstaCerradaAttribute()
    {
        return Carbon::parse($this->fecha_cierre)->isPast();
    }
}
