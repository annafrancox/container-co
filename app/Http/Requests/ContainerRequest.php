<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContainerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string',
            'total_amount' => 'required|numeric',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'nome',
            'total_amount' => 'capacidade total'
        ];
    }
}
