<?php

use App\Http\Middleware\WithCart;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\ToppingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PizzaToppingsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [IndexController::class, 'index'])
    ->name('homepage')
    ->middleware(WithCart::class);

Route::get('/add_pizza', [CartController::class, 'add_pizza'])
    ->name('add_pizza_to_cart')
    ->middleware(WithCart::class);

Route::view('/tailwind', 'tailwind');

Route::middleware(['auth'])
    ->prefix('dashboard')
    ->group(function () {

        Route::get('/', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::resources([
            'pizza' => PizzaController::class,
            'topping' => ToppingController::class,
            'pizza.toppings' => PizzaToppingsController::class,
        ]);
    });

require __DIR__ . '/auth.php';
