<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddPizzaToppingRequest;
use App\Models\Pizza;
use App\Models\Topping;
use Illuminate\Http\RedirectResponse;

class PizzaToppingsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param AddPizzaToppingRequest $request
     * @param Pizza                  $pizza
     *
     * @return RedirectResponse
     */
    public function store(AddPizzaToppingRequest $request, Pizza $pizza)
    {
        $topping_id = (int) $request->get('topping_id');
        $quantity = (int) $request->get('quantity');

        $pizza
            ->toppings()
            ->attach($topping_id);

        return redirect()
            ->route('pizza.edit', $pizza)
            ->with('success', __('Topping added to pizza.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Pizza   $pizza
     * @param Topping $topping
     *
     * @return RedirectResponse
     */
    public function destroy(Pizza $pizza, Topping $topping)
    {
        $pizza
            ->toppings()
            ->detach($topping);

        return redirect()
            ->route('pizza.edit', $pizza)
            ->with('success', __('Topping removed from pizza succesfully.'));
    }
}
