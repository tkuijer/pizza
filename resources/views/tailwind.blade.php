<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tailwind experiments</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-gray-300">
<div class="grid lg:grid-cols-2 bg-gray-100 2xl:grid-cols-5">
    <div class="px-8 py-12 max-w-md mx-auto sm:max-w-xl lg:px-12 lg:py-24 lg:max-w-full xl:mr-0 2xl:col-span-2">
        <div class="xl:max-w-xl">
            <img class="h-10" src="{{ asset('img/logo.svg') }}" alt="Logo">

            <img class="mt-6 rounded-lg shadow-xl sm:mt-8 sm:h-64 sm:w-full sm:object-cover object-center lg:hidden" src="{{ asset('img/beach-work.jpg') }}" alt="Woman on beach">

            <h1 class="mt-6 text-2xl font-bold text-gray-900 sm:mt-8 sm:text-4xl lg:text-3xl xl:text-4xl">
                You can work from anywhere. <br class="hidden lg:inline"/>
                <span class="text-indigo-500">Take advantage of it.</span>
            </h1>
            <p class="mt-2 text-gray-600 sm:mt-4 sm:text-xl">

                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Commodi cum doloribus, esse iure optio quo velit.
                Aspernatur consequuntur cum debitis deleniti dignissimos hic maiores, quae, quisquam quo reiciendis sequi voluptas?
            </p>
            <div class="mt-4 sm:mt-6 space-x-1">
                <a class="btn btn-primary shadow-lg hover:-translate-y-0.5 transform transition" href="#">Book your escape</a>
                <a class="btn btn-secondary" href="#">Learn more</a>
            </div>
        </div>
    </div>
    <div class="hidden lg:block relative 2xl:col-span-3">
        <img class="absolute inset-0 w-full h-full object-cover object-center" src="{{ asset('img/beach-work.jpg') }}" alt="Woman on beach">
    </div>
</div>
</body>
</html>
