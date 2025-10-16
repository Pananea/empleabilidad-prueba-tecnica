<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Vacante;
use App\Models\Participante;

class StorePostulacionRequest extends FormRequest
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
        return [
            'participante_id' => 'required|exists:participantes,id',
            'vacante_id' => 'required|exists:vacantes,id',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $participante = Participante::find($this->participante_id);
            $vacante = Vacante::find($this->vacante_id);

            if ($participante && $participante->estado !== 'activo') {
                $validator->errors()->add('participante_id', 'El participante no está activo.');
            }

            if ($vacante && $vacante->estado !== 'publicada') {
                $validator->errors()->add('vacante_id', 'La vacante no está disponible.');
            }
        });
    }
}
