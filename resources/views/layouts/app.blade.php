<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Backup Manager</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gray-100 flex">
    <aside class="w-64 bg-gray-800 text-white min-h-screen px-4 py-6">
        <h1 class="text-2xl font-bold mb-6">Backup Manager</h1>
        <nav>
            <ul>
                <li><a href="{{ route('dashboard') }}" class="block py-2">Dashboard</a></li>
                <li><a href="{{ route('backupservers.index') }}" class="block py-2">Backup Servers</a></li>
            </ul>
        </nav>
    </aside>
    <div class="flex-1 p-6">
        <nav class="flex justify-end mb-4">
            @auth
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-sm text-gray-600">Logout</button>
            </form>
            @endauth
        </nav>
        @yield('content')
    </div>
</body>
</html>
