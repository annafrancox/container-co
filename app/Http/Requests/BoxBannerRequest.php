<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BoxBannerRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'content_id' => 'required|exists:contents,id',
            'box_id' => 'required|exists:boxes,id',
        ];
    }

    public function attributes(){
        return [
            'content_id' => "conteúdo",
            'box_id' => 'box',
        ];
    }
}
