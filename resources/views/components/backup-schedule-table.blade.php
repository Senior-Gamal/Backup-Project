@props(['servers'])
<table class="min-w-full bg-white dark:bg-gray-700 shadow rounded">
    <thead>
        <tr>
            <th class="px-4 py-2 text-left">Server</th>
            <th class="px-4 py-2 text-left">Backup Time</th>
            <th class="px-4 py-2 text-left">Type</th>
        </tr>
    </thead>
    <tbody>
        @forelse($servers as $server)
        <tr class="border-t border-gray-200 dark:border-gray-600">
            <td class="px-4 py-2">{{ $server->hostname }}</td>
            <td class="px-4 py-2">{{ $server->timezone }}</td>
            <td class="px-4 py-2">N/A</td>
        </tr>
        @empty
        <tr><td class="px-4 py-2" colspan="3">No servers found</td></tr>
        @endforelse
    </tbody>
</table>
