<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreEmpresaRequest extends FormRequest
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
            'nit' => 'required|unique:empresas,nit',
            'nombre_empresa' => 'required|string|max:255',
            'email' => 'required|email|unique:empresas,email',
            'telefono' => 'required|digits:10',
            'ciudad' => 'required|string|max:255',
            'estado' => 'in:activa,inactiva',
        ];
    }
    public function messages(): array
    {
        return [
            'nit.required' => 'El NIT es obligatorio.',
            'nit.unique' => 'Este NIT ya está registrado.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.unique' => 'Este correo ya está registrado.',
            'telefono.digits' => 'El teléfono debe tener exactamente 10 dígitos.',
            'ciudad.required' => 'La ciudad es obligatoria.',
        ];
    } 
}
