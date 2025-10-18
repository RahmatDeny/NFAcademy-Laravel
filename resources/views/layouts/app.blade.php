<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Book Sales')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .container { max-width: 112rem; }
    </style>
    @stack('head')
    @yield('head')
    
</head>
<body class="bg-gradient-to-br from-slate-50 to-slate-100 min-h-screen">
    <header class="border-b border-gray-200 bg-white/90 backdrop-blur sticky top-0 z-50">
        <div class="container mx-auto px-4 py-4 flex items-center justify-between">
            <div>
                <a href="{{ route('page.genres') }}" class="text-xl font-bold text-gray-800">Book Sales</a>
            </div>
            <nav class="flex gap-2">
                <a href="{{ route('page.genres') }}"
                   class="px-4 py-2 rounded-md text-sm font-semibold {{ request()->routeIs('page.genres') ? 'bg-blue-600 text-white shadow hover:bg-blue-700' : 'text-gray-700 hover:bg-gray-100' }}">
                    Genres
                </a>
                <a href="{{ route('page.authors') }}"
                   class="px-4 py-2 rounded-md text-sm font-semibold {{ request()->routeIs('page.authors') ? 'bg-emerald-600 text-white shadow hover:bg-emerald-700' : 'text-gray-700 hover:bg-gray-100' }}">
                    Authors
                </a>
                <a href="{{ route('page.books') }}"
                   class="px-4 py-2 rounded-md text-sm font-semibold {{ request()->routeIs('page.books') ? 'bg-purple-600 text-white shadow hover:bg-purple-700' : 'text-gray-700 hover:bg-gray-100' }}">
                    Books
                </a>
            </nav>
        </div>
    </header>

    <main class="container mx-auto px-4 py-8">
        @yield('content')
    </main>

    @stack('scripts')
    @yield('scripts')
</body>
</html>

