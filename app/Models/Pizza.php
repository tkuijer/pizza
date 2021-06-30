<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pizza extends Model
{
    use HasFactory;

    public static $validationRules = [
        'name' => 'required|unique:pizzas:name'
    ];

    public function toppings()
    {
        return $this->belongsToMany(Topping::class)->withPivot('quantity');
    }
}
