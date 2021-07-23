<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editing pizza: ":pizza"', ['pizza' => $pizza->name]) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-errors />
                    <x-success />

                    <form action="{{ route('pizza.update', $pizza) }}" method="post">
                        @csrf
                        @method('PATCH')

                        <label class="block font-bold" for="name">{{ __('Name:') }}</label>
                        <input class="rounded-lg w-96 block mb-5 mt-2" type="text" name="name" id="name" value="{{ old('name', $pizza->name) }}" placeholder="{{ __('Pizza name') }}" />
                        <button class="rounded px-4 py-2 bg-indigo-500 hover:bg-indigo-400 text-gray-100" type="submit">{{ __('Update') }}</button>
                    </form>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <span class="block font-bold">{{ __('Toppings:') }}</span>
                    @if($pizza->hasToppings())
                        <ul class="block mb-5">
                            @foreach($pizza->toppings as $topping)
                                <li>
                                    <form action="{{ route('pizza.toppings.destroy', [$pizza, $topping]) }}" method="post">
                                        @csrf
                                        @method('DELETE')

                                        <span class="w-80 inline-block">
                                            <a href="{{ route('topping.edit', $topping) }}">
                                                {{ $topping->pivot->quantity }}x {{ $topping->name }}
                                            </a>
                                        </span>

                                        <span class="w-16 inline-block">
                                            <button type="submit">
                                                Remove
                                            </button>
                                        </span>
                                    </form>
                                </li>
                            @endforeach
                        </ul>
                    @else

                    @endif

                    <form action="{{ route('pizza.toppings.store', $pizza) }}" method="post">
                        @csrf

                        <label for="toppings" class="block font-bold">{{ __('Add a topping:') }}</label>
                        <select id="toppings" name="topping_id" class="rounded-lg w-96 block mb-5 mt-2">
                            @foreach($availableToppings as $topping)
                                @if ( ! $pizza->toppings->contains($topping))
                                    <option value="{{ $topping->id }}">{{ $topping->name }}</option>
                                @endif
                            @endforeach
                        </select>

                        <label for="quantity">{{ __('Quantity:') }}</label>
                        <input value="{{ old('quantity', 1) }}" type="number" min="1" class="rounded-lg w-96 block mb-5 mt-2" id="quantity" name="quantity" />

                        <button class="rounded px-4 py-2 bg-indigo-500 hover:bg-indigo-400 text-gray-100" type="submit">{{ __('Add topping') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
