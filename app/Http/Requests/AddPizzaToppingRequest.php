<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddPizzaToppingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'topping_id' => 'integer|required|exists:App\Models\Topping,id',
            'quantity' => 'integer|min:1|required',
        ];
    }
}
