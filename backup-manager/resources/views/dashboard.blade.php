<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css">
</head>
<body>
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Servers</h1>
    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="px-4 py-2">Hostname</th>
                <th class="px-4 py-2">IP</th>
                <th class="px-4 py-2">Timezone</th>
            </tr>
        </thead>
        <tbody>
            @foreach($servers as $server)
            <tr class="border-t">
                <td class="px-4 py-2">{{ $server->hostname }}</td>
                <td class="px-4 py-2">{{ $server->ip }}</td>
                <td class="px-4 py-2">{{ $server->timezone }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
