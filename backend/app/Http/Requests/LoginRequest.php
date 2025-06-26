<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
             /**
             * @example drp6@aluno.ifnmg.edu.br
             */
            'email' => [
                'required',
                'email',
                'exists:users,email',
                'regex:/@(ifnmg\.edu\.br|aluno\.ifnmg\.edu\.br)$/i'
            ],
            /**
             * @example aluno@cajui
             */
            'password' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Por favor, informe o seu endereço de e-mail.',
            'email.email' => 'Insira um endereço de e-mail válido.',
            'email.exists' => 'O e-mail informado não está cadastrado em nosso sistema.',
            'email.regex' => 'O e-mail deve ser dos domínios ifnmg.edu.br ou aluno.ifnmg.edu.br.',
            'password.required' => 'Por favor, informe a sua senha.',
            'password.string' => 'A senha deve ser um texto válido.',
        ];
    }
}
