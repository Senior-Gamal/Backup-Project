<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Backup Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.4/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <nav class="mb-4 space-x-4">
        <a href="{{ route('dashboard') }}">Dashboard</a>
        <a href="{{ route('backupservers.index') }}">Backup Servers</a>
        <a href="{{ route('clientservers.index') }}">Client Servers</a>
        <a href="{{ route('licenses.index') }}">Licenses</a>
        <a href="{{ route('schedules.index') }}">Schedules</a>
        <form method="POST" action="{{ route('logout') }}" class="inline">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </nav>
    @yield('content')
</body>
</html>
