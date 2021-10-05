<?php

namespace App\Http\Middleware;

use App\Models\Cart;
use Closure;
use Illuminate\Http\Request;

class WithCart
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $cart_id = session('cart_id', false);

        // When the cart doesn't exist, we create a new cart for the user
        if (! $cart_id ||
            ! Cart::where('id', (int) $cart_id)->exists()) {
            $cart = Cart::create();
            session(['cart_id' => $cart->id]);
        }

        return $next($request);
    }
}
