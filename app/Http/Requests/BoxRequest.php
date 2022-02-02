<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BoxRequest extends FormRequest
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
            'name' => 'required|string|min:3|max:255|unique:boxes' . ($this->getMethod() != "PUT" ?  '':',name,' . $this->box->id),
            'content_list' => "array|min:1|max:10",
            'content_list.*' => 'file|mimes:jpeg,png,bmp,svg,webp,doc,rtf,docx,pdf,csv,xls,xlsx,gif,ico,mp3,mp4,mov,ogg,qt,weba,webp,mpeg,ppt,pptm,pptx|max:50000',
        ];
    }

    public function attributes(){
        return [
            'name' => "nome",
            'content_list' => "Arquivos",
            'content_list.*' => "Arquivo"

        ];
    }

    public function messages(){
        return [
            'content_list.*.mimes' => "Tipo de :attribute inválido!",
        ];
    }
}
