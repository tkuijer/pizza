<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Pizza;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\AddPizzaToCartRequest;

class CartController extends Controller
{

    /**
     * @param AddPizzaToCartRequest $request
     * @return RedirectResponse
     */
    public function add_pizza(AddPizzaToCartRequest $request)
    {
        $cart = Cart::getCurrentCart();
        $pizza = Pizza::find((int)$request->pizza_id);

        $cart->pizzas()->attach($pizza);

        return redirect()
            ->back()
            ->with('success', __('Pizza added to cart!'));
    }
}
