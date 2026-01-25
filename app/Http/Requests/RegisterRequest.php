<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
       return [
            'name'     => 'required|string|min:3',
            'email'    => 'required|email',
            'company'  => 'required|string|min:3', // Quitamos la regex restrictiva aquí
            'password' => 'required|confirmed|min:8',
            'plan_id'  => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'company.regex' => 'El nombre de la clínica solo puede contener letras minúsculas, números y guiones.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
        ];
    }
}
