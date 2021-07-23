<?php

namespace App\Http\Controllers;

use App\Models\Topping;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\CreateToppingRequest;
use App\Http\Requests\UpdateToppingRequest;

class ToppingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $toppings = Topping::all();

        return view('admin.topping.index', compact('toppings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('admin.topping.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateToppingRequest $request
     * @return RedirectResponse
     */
    public function store(CreateToppingRequest $request)
    {
        $topping = Topping::create([
            'name' => $request->get('name')
        ]);

        return redirect()
            ->route('topping.edit', $topping)
            ->with('success', __('Topping created succesfully!'));
    }

    /**
     * Display the specified resource.
     *
     * @param Topping $topping
     * @return \Illuminate\Http\Response
     */
    public function show(Topping $topping)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Topping $topping
     * @return View
     */
    public function edit(Topping $topping)
    {
        return view('admin.topping.edit', compact('topping'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateToppingRequest $request
     * @param Topping $topping
     * @return RedirectResponse
     */
    public function update(UpdateToppingRequest $request, Topping $topping)
    {
        $topping->name = $request->get('name');
        $topping->save();

        return redirect()
            ->route('topping.edit', compact('topping'))
            ->with('success', __('Topping updated successfully!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Topping $topping
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topping $topping)
    {
        //
    }
}
