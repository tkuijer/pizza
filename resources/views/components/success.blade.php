@if(session('success'))
    <div class="border-green-900 bg-green-300 text-green-900 border-solid rounded p-3 mb-8">
        <h2 class="font-bold">{{ session('success') }}</h2>
    </div>
@endif
