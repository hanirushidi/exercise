<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My App')</title>
    
    <!-- Vite CSS and JS assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50">
    <!-- Fullscreen Flexbox Container -->
    <div class=" flex items-center justify-center w-full">
        <div class="w-full max-w-4xl p-6 bg-white rounded-lg shadow-lg">
            <!-- Page Header -->
            <header class="mb-6 text-center">
                @isset($header)
                    <h1 class="text-3xl font-semibold text-gray-800">{{ $header }}</h1>
                @endisset
            </header>

            <!-- Page Content -->
            <main>
                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>
