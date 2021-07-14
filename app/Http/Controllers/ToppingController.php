<?php

namespace App\Http\Controllers;

use App\Models\Topping;
use Illuminate\View\View;
use Illuminate\Http\Request;

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

        return view('topping.index', compact('toppings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        return view('topping.edit', compact('topping'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Topping $topping
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Topping $topping)
    {
        //
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
