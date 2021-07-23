<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Prunable;

class Cart extends Model
{

    use Prunable;

    protected $guarded = [];

    /**
     * Get the prunable model query.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function prunable()
    {
        return static::where(static::UPDATED_AT, '<=', now()->subWeek());
    }

    /**
     * Prepare the model for pruning by detaching associated pizzas.
     *
     * @return void
     */
    protected function pruning()
    {
        $this->pizzas()->detach();
    }

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
