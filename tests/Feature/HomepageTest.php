<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Pizza\Pizza;
use App\Models\Topping;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomepageTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_shows_pizzas_on_the_homepage()
    {
        $pizza = $this->createPizza();
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee($pizza->name);
    }

    /** @test */
    public function it_shows_pizza_toppings_on_the_homepage()
    {
        $toppings = $this->createToppings(2);
        $pizza = $this->createPizza();
        $pizza->toppings()->saveMany($toppings);

        $response = $this->get('/');

        $response->assertStatus(200);
        $toppings->each(function (Topping $topping) use ($response) {
            $response->assertSee($topping->name);
        });
    }

    private function createPizza(string $name = 'Pizza 1'): Pizza
    {
        return Pizza::factory()->create([
            'name' => $name,
        ]);
    }

    private function createToppings(int $count = 1): Collection
    {
        return Topping::factory($count)->create();
    }
}
