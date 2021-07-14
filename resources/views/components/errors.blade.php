@if($errors->any())
    <div class="border-red-900 bg-red-300 text-red-900 border-solid rounded p-3 mb-8">
        <h2 class="mb-2 font-bold">{{ __('Something is wrong:') }}</h2>
        <ul>
            @foreach($errors->all() as $error)
                <li class="list-item">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
