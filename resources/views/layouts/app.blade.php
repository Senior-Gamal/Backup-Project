<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <title>Backup Manager</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function toggleTheme(){
            document.documentElement.classList.toggle('dark');
        }
    </script>
</head>
<body class="min-h-screen bg-gray-100 dark:bg-gray-900 flex text-gray-800 dark:text-gray-100">
    <aside class="w-64 bg-gray-800 text-white min-h-screen px-4 py-6 hidden md:block">
        <h1 class="text-2xl font-bold mb-6">Backup Manager</h1>
        <nav class="space-y-2">
            <a href="{{ route('dashboard') }}" class="block">Dashboard</a>
            <a href="{{ route('backupservers.index') }}" class="block">Backup Servers</a>
            <a href="#" class="block">Client Servers</a>
            <a href="#" class="block">Licenses</a>
            <a href="#" class="block">Users</a>
            <a href="#" class="block">Roles &amp; Permissions</a>
        </nav>
    </aside>
    <div class="flex-1 flex flex-col">
        <nav class="flex justify-between items-center bg-white dark:bg-gray-800 px-4 py-2 shadow">
            <button class="md:hidden" onclick="document.querySelector('aside').classList.toggle('hidden')">☰</button>
            <div>
                <button onclick="toggleTheme()" class="mr-4">🌓</button>
                @auth
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
                @endauth
            </div>
        </nav>
        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>
</body>
</html>
