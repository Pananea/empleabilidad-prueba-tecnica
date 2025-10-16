<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use App\Models\Empresa;

class StoreVacanteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $fechaHoy = Carbon::now()->format('Y-m-d');

        return [
            'company_id' => [
                'required',
                'exists:empresas,id',
                function ($attribute, $value, $fail) {
                    $empresa = Empresa::find($value);
                    if ($empresa && $empresa->estado !== 'activa') {
                        $fail('La empresa debe estar activa para publicar vacantes.');
                    }
                },
            ],
            'titulo' => 'required|string|max:150',
            'descripcion' => 'required|string',
            'salario' => 'required|numeric|min:1300000',
            'ciudad' => 'required|string|max:100',
            'nivel_educativo_minimo' => [
                'required',
                Rule::in(['bachillerato', 'técnico', 'tecnólogo', 'profesional']),
            ],
            'experiencia_minima_años' => 'required|integer|min:0|max:50',
            'numero_vacantes' => 'required|integer|min:1',
            'fecha_cierre' => "required|date|after:$fechaHoy",
            'estado' => 'nullable|in:publicada,cerrada',
        ];
    }

    public function messages(): array
    {
        return [
            'company_id.required' => 'Debes seleccionar una empresa.',
            'company_id.exists' => 'La empresa seleccionada no existe.',
            'titulo.required' => 'El título de la vacante es obligatorio.',
            'descripcion.required' => 'Debes escribir una descripción.',
            'salario.min' => 'El salario debe ser al menos $1.300.000.',
            'fecha_cierre.after' => 'La fecha de cierre debe ser una fecha futura.',
            'numero_vacantes.min' => 'Debe haber al menos 1 vacante disponible.',
        ];
    }
}
