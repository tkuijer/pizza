<x-guest-layout>

    <!-- Page Heading -->
    <header class="bg-white shadow">
        <div class="flex max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <div class="w-1/2">
                <h2 class="font-semibold text-3xl text-gray-800 leading-tight">
                    {{ __('Pizza Zone Homepage') }}
                </h2>
            </div>

            @if (Route::has('login'))
                <div class="w-1/2 text-right">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </header>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-600">
                    <ul>
                        @foreach($pizzas as $pizza)
                            <li class="border-gray-800 p-6 bg-white border-b">
                                <h3 class="font-semibold text-xl text-gray-800 leading-tight">
                                    {{ $pizza->name }}
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
