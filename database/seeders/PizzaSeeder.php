<?php

namespace Database\Seeders;

use App\Models\Pizza;
use App\Models\Topping;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PizzaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pizzas')->truncate();
        DB::table('pizza_topping')->truncate();

        Pizza::factory(12)
            ->create()
            ->each(function (Pizza $pizza) {
                $toppings = Topping::all()->random(rand(3, 6));
                $pizza->toppings()->saveMany($toppings);
            });

    }
}
