<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class StoreParticipanteRequest extends FormRequest
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
        $minFechaNacimiento = Carbon::now()->subYears(18)->format('Y-m-d');

        return [
            'numero_documento' => 'required|unique:participantes,numero_documento',
            'nombres' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'email' => 'required|email|unique:participantes,email',
            'telefono' => 'required|digits:10',
            'fecha_nacimiento' => "required|date|before_or_equal:$minFechaNacimiento",
            'ciudad' => 'required|string|max:100',
            'nivel_educativo' => [
                'required',
                Rule::in(['bachillerato', 'técnico', 'tecnólogo', 'profesional']),
            ],
            'años_experiencia' => 'required|integer|min:0|max:50',
            'estado' => 'nullable|in:activo,colocado',
        ];
    }
    public function messages(): array
    {
        return [
            'numero_documento.required' => 'El número de documento es obligatorio.',
            'numero_documento.unique' => 'Ya existe un participante con este número de documento.',
            'email.unique' => 'El correo electrónico ya está registrado.',
            'telefono.digits' => 'El teléfono debe tener exactamente 10 dígitos.',
            'fecha_nacimiento.before_or_equal' => 'El participante debe tener al menos 18 años.',
            'nivel_educativo.in' => 'El nivel educativo no es válido.',
            'años_experiencia.max' => 'Los años de experiencia no pueden superar 50.',
        ];
    }
}
