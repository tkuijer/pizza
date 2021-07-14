<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Topping extends Model
{
    use HasFactory;

    public function pizzas()
    {
        return $this->belongsToMany(Pizza::class)->withPivot('quantity');
    }
}
