<x-guest-layout>

    <x-header />

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-600">
                    <ul>
                        @foreach($cart->pizzas as $pizza)
                            <li class="border-gray-800 p-6 bg-white border-b">
                                <h3 class="font-semibold text-xl text-gray-800 leading-tight inline-block">
                                    {{ $pizza->name }}
                                    <span class="text-right">
                                        <a href="{{ route('add_pizza_to_cart', ['pizza_id' => $pizza]) }}">Add to cart</a>
                                    </span>
                                </h3>
                                <ul>
                                    @foreach($pizza->toppings as $topping)
                                        <li>
                                            {{ $topping->pivot->quantity }}x {{ $topping->name }}
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
