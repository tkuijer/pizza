<?php

namespace Database\Seeders;

use App\Models\Topping;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ToppingSeeder extends Seeder
{

    public static $_seed = [
        'Pizza Sauce',
        'BBQ Sauce',
        'No Sauce',
        'Mozzarella',
        'Parmesan',
        'No Cheese',
        'Pepperoni',
        'Bacon',
        'Onion',
        'Olives',
        'Mushroom',
        'Ham',
        'Pineapple',
        'Chicken',
        'Prosciutto',
        'Garlic',
        'Oregano',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('toppings')->truncate();

        foreach (static::$_seed as $topping) {
            Topping::create([
                'name' => $topping
            ]);
        }
    }
}
