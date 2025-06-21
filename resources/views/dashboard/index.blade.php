@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-6">Dashboard</h2>

<div class="grid grid-cols-1 md:grid-cols-4 gap-4">
    <div class="bg-white p-4 shadow rounded">
        <div class="text-gray-500">Total Client Servers</div>
        <div class="text-2xl">{{ $totalClientServers }}</div>
    </div>
    <div class="bg-white p-4 shadow rounded">
        <div class="text-gray-500">Total Backup Servers</div>
        <div class="text-2xl">{{ $totalBackupServers }}</div>
    </div>
    <div class="bg-white p-4 shadow rounded">
        <div class="text-gray-500">Total Active Licenses</div>
        <div class="text-2xl">{{ $totalActiveLicenses }}</div>
    </div>
    <div class="bg-white p-4 shadow rounded">
        <div class="text-gray-500">Upcoming Backups</div>
        <div class="text-2xl">{{ $upcomingBackups }}</div>
    </div>
</div>

@if(in_array(auth()->user()->role, ['admin','manager']))
<div class="mt-8">
    <h3 class="font-bold mb-2">Backup Schedule Snapshot</h3>
    <table class="min-w-full bg-white shadow rounded">
        <thead>
            <tr>
                <th class="px-4 py-2 text-left">Server</th>
                <th class="px-4 py-2 text-left">Backup Time</th>
                <th class="px-4 py-2 text-left">Type</th>
            </tr>
        </thead>
        <tbody>
            @forelse($servers as $server)
            <tr class="border-t">
                <td class="px-4 py-2">{{ $server->hostname }}</td>
                <td class="px-4 py-2">{{ $server->timezone }}</td>
                <td class="px-4 py-2">N/A</td>
            </tr>
            @empty
            <tr><td class="px-4 py-2" colspan="3">No servers found</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-8">
    <h3 class="font-bold mb-2">Recent Activity</h3>
    <p>No recent activity</p>
</div>
@endif

<div class="mt-8">
    <h3 class="font-bold mb-2">System Health</h3>
    <ul class="list-disc pl-5">
        <li>PHP Version: {{ PHP_VERSION }}</li>
        <li>Disk Free: {{ round(disk_free_space('/') / 1073741824, 2) }} GB</li>
        <li>Timezone: {{ date_default_timezone_get() }}</li>
    </ul>
</div>

@if(in_array(auth()->user()->role, ['admin','manager']))
<div class="mt-8">
    <h3 class="font-bold mb-2">Quick Actions</h3>
    <div class="flex flex-wrap gap-2">
        <a href="{{ route('backupservers.create') }}" class="bg-blue-500 text-white px-3 py-2 rounded">Add Backup Server</a>
    </div>
</div>
@endif
@endsection
