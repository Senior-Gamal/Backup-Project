<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Backup Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.4/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex">
    @auth
        <aside class="w-56 bg-gray-800 text-gray-200 min-h-screen">
            <div class="p-4 text-lg font-semibold border-b border-gray-700">Backup Manager</div>
            <nav class="p-4 space-y-2">
                <a class="block hover:text-white {{ request()->routeIs('dashboard') ? 'font-bold' : '' }}" href="{{ route('dashboard') }}">Dashboard</a>
                <a class="block hover:text-white {{ request()->routeIs('backupservers.*') ? 'font-bold' : '' }}" href="{{ route('backupservers.index') }}">Backup Servers</a>
                <a class="block hover:text-white {{ request()->routeIs('clientservers.*') ? 'font-bold' : '' }}" href="{{ route('clientservers.index') }}">Client Servers</a>
                <a class="block hover:text-white {{ request()->routeIs('licenses.*') ? 'font-bold' : '' }}" href="{{ route('licenses.index') }}">Licenses</a>
                <a class="block hover:text-white {{ request()->routeIs('schedules.*') ? 'font-bold' : '' }}" href="{{ route('schedules.index') }}">Schedules</a>
                <form method="POST" action="{{ route('logout') }}" class="mt-4">
                    @csrf
                    <button class="block w-full text-left hover:text-white" type="submit">Logout</button>
                </form>
            </nav>
        </aside>
        <main class="flex-1 p-6">
            @yield('content')
        </main>
    @else
        <main class="flex-1 flex items-center justify-center p-6">
            @yield('content')
        </main>
    @endauth
</body>
</html>

