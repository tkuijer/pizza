<table class="w-full mx-2">
    <thead>
    <tr class="border-b">
        <th class="text-center px-2">ID</th>
        <th class="text-left">Name</th>
        <th>&nbsp;</th>
    </tr>
    </thead>
    <tbody>
    @foreach($pizzas as $pizza)
        <tr class="hover:bg-gray-200 py-2 mb-4">
            <td class="text-center px-2 align-text-top">
                <a class="hover:underline inline-block w-full" href="{{ route('pizza.edit', $pizza) }}">
                    {{ $pizza->id }}
                </a>
            </td>
            <td>
                <a class="hover:underline inline-block w-full" href="{{ route('pizza.edit', $pizza) }}">
                    {{ $pizza->name }} <br />
                    <span class="text-gray-600 text-xs">
                        {{ $pizza->toppings->implode('name', ', ') }}
                    </span>
                </a>
            </td>
            <td class="text-right px-2">
                <form action="{{ route('pizza.destroy', $pizza) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit">x</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
