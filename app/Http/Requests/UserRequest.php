<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /*
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email|string|unique:users' . ($this->getMethod() != "PUT" ?  '':',email,' . $this->user->id),
            'dateBirth' => 'required',
            'admin' => 'boolean',
            'password' => 'nullable|string|min:8|confirmed',
            'password_confirmation' => 'required_with:password',
            'profile_path' => 'image|mimes:jpeg,png,bmp,svg,webp|max:10000',
            'password' => ($this->getMethod() != "PUT" ? 'required|' : 'nullable|') . 'string|min:8|confirmed',
            'password_confirmation' => 'required_with:password',
            'cpf' => 'required|string|unique:users' . ($this->getMethod() != "PUT" ?  '':',cpf,' . $this->user->id),
            'phone' => 'required|string',
            'identity' => 'required|string|unique:users' . ($this->getMethod() != "PUT" ?  '':',identity,' . $this->user->id),
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'nome',
            'email' => 'e-mail',
            'dateBirth' => 'data de nascimento',
            'password' => 'senha',
            'password_confirmation' => 'confirmação de senha',
            'profile_path' => 'imagem',
            'phone' => 'telefone',
            'identity' => 'identificação',
        ];
    }
}
