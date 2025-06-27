@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        <div class="bg-white shadow p-4 rounded">
            <div class="text-sm text-gray-500">Client Servers</div>
            <div class="text-2xl font-semibold">{{ $client_servers }}</div>
        </div>
        <div class="bg-white shadow p-4 rounded">
            <div class="text-sm text-gray-500">Backup Servers</div>
            <div class="text-2xl font-semibold">{{ $backup_servers }}</div>
        </div>
        <div class="bg-white shadow p-4 rounded">
            <div class="text-sm text-gray-500">Licenses</div>
            <div class="text-2xl font-semibold">{{ $licenses }}</div>
        </div>
    </div>

    <div class="mb-6">
        <h2 class="text-lg font-semibold mb-2">Today's Backups</h2>
        <table class="min-w-full bg-white shadow rounded">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Time</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Server</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Type</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($todays_schedules as $schedule)
                    <tr class="border-t">
                        <td class="px-4 py-2">{{ $schedule->scheduled_at }}</td>
                        <td class="px-4 py-2">{{ $schedule->server->hostname }}</td>
                        <td class="px-4 py-2">{{ $schedule->type }}</td>
                    </tr>
                @empty
                    <tr>
                        <td class="px-4 py-2" colspan="3">No backups scheduled today.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div>
        <h2 class="text-lg font-semibold mb-2">Recent Activity</h2>
        <ul class="bg-white shadow rounded divide-y">
            @foreach ($recent_logs as $log)
                <li class="px-4 py-2">{{ $log->created_at->format('Y-m-d H:i') }} - {{ $log->action }}</li>
            @endforeach
        </ul>
    </div>
@endsection

