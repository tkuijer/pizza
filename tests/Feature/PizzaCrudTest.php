<?php

namespace Tests\Feature;

use DB;
use Tests\TestCase;
use App\Models\User;
use App\Pizza\Pizza;
use App\Models\Topping;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PizzaCrudTest extends TestCase
{
    use RefreshDatabase;

    private $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
    }

    /** @test */
    public function it_shows_a_listing_of_pizzas()
    {
        $pizzas = $this->createPizzas(3);

        $response = $this->actingAs($this->user)
            ->get(route('pizza.index'));

        $response->assertStatus(200);
        $pizzas->each(function (Pizza $pizza) use ($response) {
            $response->assertSee($pizza->name);
        });
    }

    /** @test */
    public function it_can_create_a_pizza()
    {
        $response = $this->actingAs($this->user)
            ->post(route('pizza.store'), [
                'name' => 'Testing Pizza',
            ]);

        $response->assertStatus(302);
        $response->assertRedirect(route('pizza.edit', 1));

        $this->assertTrue(DB::table('pizzas')->where('name', 'Testing Pizza')->exists());
    }

    /** @test */
    public function it_can_delete_a_pizza()
    {
        $pizza = Pizza::factory()->create([
            'name' => 'Testing Pizza',
        ]);

        $response = $this->actingAs($this->user)->delete(route('pizza.destroy', $pizza));

        $response->assertStatus(302);
        $response->assertRedirect(route('pizza.index'));
        $response->assertSessionHas('success');

        $this->assertFalse(DB::table('pizzas')->where('name', 'Testing Pizza')->exists());
    }

    /** @test */
    public function it_can_update_a_pizza()
    {
        $pizza = Pizza::factory()->create([
            'name' => 'Testing Pizza',
        ]);

        $response = $this->actingAs($this->user)
            ->patch(route('pizza.update', $pizza), [
                'name' => 'Updated testing pizza',
            ]);

        $pizza = $pizza->fresh();

        $response->assertStatus(302);
        $response->assertSessionHas('success');
        $response->assertRedirect(route('pizza.edit', $pizza));

        $this->assertEquals('Updated testing pizza', $pizza->name);
    }

    private function createPizzas(int $count = 1): Collection
    {
        return Pizza::factory($count)->create();
    }

    private function createToppings(int $count = 1): Collection
    {
        return Topping::factory($count)->create();
    }
}
