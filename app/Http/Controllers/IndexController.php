<?php

namespace App\Http\Controllers;

use App\Pizza\Pizza;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function index(Request $request)
    {
        $pizzas = Pizza::with('toppings')->get();

        return view('index', compact('pizzas'));
    }
}
