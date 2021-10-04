<?php

namespace App\Pizza\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddPizzaToCartRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return session()->has('cart_id');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'pizza_id' => 'required|exists:pizzas,id',
        ];
    }
}
