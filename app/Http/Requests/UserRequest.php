<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use function PHPUnit\Framework\returnSelf;

class UserRequest extends FormRequest
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

        $userId = $this->route('user');

        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.($userId ? $userId : null),
            'password' => 'required|min:6',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Campo Obrigatorio',
            'email.required' => 'Campo Obrigatorio',
            'email.email' => 'Email Inavalido!',
            'email.unique' => 'E-mail já cadastrado!',
            'password.required' => 'Campo Obrigatorio',
            'password.min' => 'Senha com :min caracteres',
        ];
    }
}
