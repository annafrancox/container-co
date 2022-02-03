<?php

namespace App\Http\Requests;

use App\Rules\ContainerAmount;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'string|required',
            'amount' => ['required', 'min:1', 'max:2147483647', 'numeric', new ContainerAmount($this->amount, $this->container_id)],
            'price' => 'required|numeric|min:0|max:2147483647',
            'container_id' => 'required|exists:containers,id',
            'category_id' => 'required|exists:categories,id',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'nome',
            'amount' => 'quantidade',
            'price' => 'preço',
            'container_id' => 'container',
            'category_id' => 'category',
        ];
    }
}
