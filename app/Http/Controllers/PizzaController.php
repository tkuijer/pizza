<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use Illuminate\Http\Response;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StorePizzaRequest;
use App\Http\Requests\UpdatePizzaRequest;

class PizzaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $pizzas = Pizza::all();

        return view('pizza.index', compact('pizzas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('pizza.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePizzaRequest $request
     * @return RedirectResponse
     */
    public function store(StorePizzaRequest $request)
    {
        $pizza = Pizza::create([
            'name' => $request->get('name')
        ]);

        return redirect()
            ->route('pizza.edit', $pizza)
            ->with('success', __('Pizza created successfully!'));
    }

    /**
     * Display the specified resource.
     *
     * @param Pizza $pizza
     * @return Response
     */
    public function show(Pizza $pizza)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Pizza $pizza
     * @return Response|View
     */
    public function edit(Pizza $pizza)
    {
        $availableToppings = $pizza->getAvailableToppings();

        return view('pizza.edit', compact('pizza', 'availableToppings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdatePizzaRequest  $request
     * @param Pizza $pizza
     * @return RedirectResponse
     */
    public function update(UpdatePizzaRequest $request, Pizza $pizza)
    {
        $pizza->name = $request->get('name');
        $pizza->save();

        return redirect()
            ->route('pizza.edit', $pizza)
            ->with('success', __('Pizza updated successfully!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Pizza $pizza
     * @return RedirectResponse
     */
    public function destroy(Pizza $pizza)
    {
        $pizza->toppings()->detach();
        $pizza->delete();

        return redirect()
            ->route('pizza.index')
            ->with('success', __('Pizza deleted successfully!'));
    }
}
