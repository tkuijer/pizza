<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topping extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static $validationRules = [
        'name' => 'required|unique:toppings,name',
    ];

    public function pizzas()
    {
        return $this->belongsToMany(Pizza::class)->withPivot('quantity');
    }
}
