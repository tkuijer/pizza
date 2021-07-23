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
