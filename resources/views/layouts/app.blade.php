<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    @vite('resources/css/app.css') <!-- Ensure Tailwind is configured -->
</head>
<body class="bg-gray-100">
    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 min-h-screen text-white bg-blue-600">
            <div class="p-6">
                <h2 class="text-2xl font-bold">Admin Panel</h2>
            </div>
            <nav class="mt-6">
                <ul>
                    <li>
                        <a href="{{ route('dashboard') }}" class="block px-4 py-2 hover:bg-blue-500 {{ request()->routeIs('dashboard') ? 'bg-blue-500' : '' }}">
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('products.index') }}" class="block px-4 py-2 hover:bg-blue-500 {{ request()->routeIs('products.*') ? 'bg-blue-500' : '' }}">
                            Products
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('users.index') }}" class="block px-4 py-2 hover:bg-blue-500 {{ request()->routeIs('users.*') ? 'bg-blue-500' : '' }}">
                            Users
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('orders.index') }}" class="block px-4 py-2 hover:bg-blue-500 {{ request()->routeIs('orders.*') ? 'bg-blue-500' : '' }}">
                            Orders
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>
</body>
</html>
