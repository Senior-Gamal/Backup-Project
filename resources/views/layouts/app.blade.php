<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Backup Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@^3.4/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex">
    <aside class="w-64 bg-gray-800 text-white min-h-screen">
        <div class="p-4 text-xl font-bold border-b border-gray-700">Backup Manager</div>
        <nav class="px-4 py-2">
            <ul>
                <li><a href="{{ route('dashboard') }}" class="block py-2 px-2 rounded hover:bg-gray-700">Dashboard</a></li>
                <li><a href="{{ route('clientservers.index') }}" class="block py-2 px-2 rounded hover:bg-gray-700">Client Servers</a></li>
                <li><a href="{{ route('backupservers.index') }}" class="block py-2 px-2 rounded hover:bg-gray-700">Backup Servers</a></li>
            </ul>
        </nav>
    </aside>
    <main class="flex-1 p-6">
        @yield('content')
    </main>
</body>
</html>
