<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Pizza;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\AddPizzaToCartRequest;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::getCurrentCart();

        return view('cart.index', compact('cart'));
    }

    /**
     * @param  AddPizzaToCartRequest  $request
     * @return RedirectResponse
     */
    public function add_pizza(AddPizzaToCartRequest $request)
    {
        $cart = Cart::getCurrentCart();
        $pizzaId = (int) $request->pizza_id;
        $pizza = Pizza::find($pizzaId);

        if (! $cart->pizzas->contains($pizza)) {
            $cart->pizzas()->attach($pizza);
        } else {
            $quantity = $cart->pizzas->firstWhere('id', $pizzaId)->pivot->quantity + 1;
            $cart->pizzas()->syncWithoutDetaching([$pizzaId => ['quantity' => $quantity]]);
        }

        return redirect()
            ->route('cart.index')
            ->with('success', __('Pizza added to cart!'));
    }
}
