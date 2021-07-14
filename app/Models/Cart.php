<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{

    protected $guarded = [];

    public function pizzas()
    {
        return $this->belongsToMany(Pizza::class);
    }
}
