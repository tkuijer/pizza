<?php

namespace App\Pizza;

use App\Models\Topping;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pizza extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static $validationRules = [
        'name' => 'required|unique:pizzas,name',
    ];

    public function toppings()
    {
        return $this->belongsToMany(Topping::class)->withPivot('quantity');
    }

    public function hasToppings()
    {
        return $this->toppings->count() >= 1;
    }

    public function getAvailableToppings()
    {
        $current = $this->toppings()->pluck('toppings.id');

        return Topping::whereNotIn('id', $current)->get();
    }
}
