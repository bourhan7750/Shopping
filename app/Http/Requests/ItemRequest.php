<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Lang;

class ItemRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'code' => ['required', 'string', Rule::unique('items')->ignore($this->id)],
            'price' => ['required', 'min:0', 'integer'],
            'amount' => ['required', 'min:0', 'integer'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => Lang::get('messages.name_required'),
            'code.unique' => Lang::get('messages.code_required'),
            'price.min' => Lang::get('messages.price_invalid'),
            'price.integer' => Lang::get('messages.price_invalid'),
            'amount.min' => Lang::get('messages.amount_invalid'),
            'amount.integer' => Lang::get('messages.amount_invalid'),
        ];
    }

}