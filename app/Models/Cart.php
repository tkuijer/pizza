<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{

    protected $guarded = [];

    /**
     * @return Cart
     */
    public static function getCurrentCart()
    {
        $cart_id = (int)session('cart_id');

        return static::find($cart_id);
    }

    public function pizzas()
    {
        return $this->belongsToMany(Pizza::class);
    }
}
