<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use Illuminate\Http\Response;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StorePizzaRequest;
use App\Http\Requests\UpdatePizzaRequest;
use App\Repository\Interfaces\PizzaRepositoryInterface;
use App\Repository\Interfaces\ToppingsRepositoryInterface;

class PizzaController extends Controller
{

    protected $pizzaRepository;

    public function __construct(PizzaRepositoryInterface $pizzaRepository)
    {
        $this->pizzaRepository = $pizzaRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $pizzas = $this->pizzaRepository->all();

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
     * @return Response
     */
    public function store(StorePizzaRequest $request)
    {
        $pizza = $this->pizzaRepository->createFromRequest($request);
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
     * @return Response
     */
    public function destroy(Pizza $pizza)
    {
        //
    }
}
