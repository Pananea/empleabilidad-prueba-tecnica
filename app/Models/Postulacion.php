<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Participante;
use App\Models\Vacante;
use Carbon\Carbon;

class Postulacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'participante_id',
        'vacante_id',
        'fecha_postulacion',
        'estado',
        'puntaje',
    ];

    protected $attributes = [
        'estado' => 'postulado',
        'puntaje' => 0,
    ];

    public function participante()
    {
        return $this->belongsTo(Participante::class);
    }

    public function vacante()
    {
        return $this->belongsTo(Vacante::class);
    }

    protected static function booted()
    {
        static::creating(function ($postulacion) {
            $postulacion->fecha_postulacion = now();

            $participante = Participante::find($postulacion->participante_id);
            $vacante = Vacante::find($postulacion->vacante_id);

            if ($participante && $vacante) {
                $puntaje = 0;

                $niveles = ['bachillerato', 'técnico', 'tecnólogo', 'profesional'];
                $indiceParticipante = array_search(strtolower($participante->nivel_educativo), $niveles);
                $indiceVacante = array_search(strtolower($vacante->nivel_educativo_minimo), $niveles);

                if ($indiceParticipante !== false && $indiceVacante !== false && $indiceParticipante >= $indiceVacante) {
                    $puntaje += 40;
                }

                if ($participante->años_experiencia >= $vacante->experiencia_minima_años) {
                    $puntaje += 40;
                }

                if (strtolower($participante->ciudad) === strtolower($vacante->ciudad)) {
                    $puntaje += 20;
                }

                $postulacion->puntaje = $puntaje;
            }
        });
    }
}
