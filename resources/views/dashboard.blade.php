@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-semibold mb-4">Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
        <x-card>
            <div class="flex items-center">
                <svg class="h-6 w-6 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5h18M3 12h18M3 19h18"></path></svg>
                <div class="ml-3">
                    <div class="text-gray-500 text-sm">Client Servers</div>
                    <div class="text-2xl font-bold">{{ $client_servers }}</div>
                </div>
            </div>
        </x-card>
        <x-card>
            <div class="flex items-center">
                <svg class="h-6 w-6 text-green-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
                <div class="ml-3">
                    <div class="text-gray-500 text-sm">Backup Servers</div>
                    <div class="text-2xl font-bold">{{ $backup_servers }}</div>
                </div>
            </div>
        </x-card>
        <x-card>
            <div class="flex items-center">
                <svg class="h-6 w-6 text-purple-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8c1.104 0 2-.896 2-2s-.896-2-2-2-2 .896-2 2 .896 2 2 2zm0 2c-1.105 0-2 .895-2 2s.895 2 2 2 2-.895 2-2-.895-2-2-2zm0 6c-1.105 0-2 .895-2 2s.895 2 2 2 2-.895 2-2-.895-2-2-2z"/></svg>
                <div class="ml-3">
                    <div class="text-gray-500 text-sm">Active Licenses</div>
                    <div class="text-2xl font-bold">{{ $licenses }}</div>
                </div>
            </div>
        </x-card>
        <x-card>
            <div class="flex items-center">
                <svg class="h-6 w-6 text-orange-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2z"/></svg>
                <div class="ml-3">
                    <div class="text-gray-500 text-sm">Backups Scheduled Today</div>
                    <div class="text-2xl font-bold">{{ $today_schedules->count() }}</div>
                </div>
            </div>
        </x-card>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <x-card>
            <h2 class="text-lg font-semibold mb-2">Today's Schedules</h2>
            <table class="min-w-full text-sm">
                <thead>
                    <tr class="text-left border-b">
                        <th class="py-2">Server</th>
                        <th class="py-2">Time</th>
                        <th class="py-2">Type</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($today_schedules as $schedule)
                        <tr class="border-b">
                            <td class="py-2">{{ $schedule->server->hostname ?? 'N/A' }}</td>
                            <td class="py-2">{{ $schedule->scheduled_at->format('H:i') }}</td>
                            <td class="py-2 capitalize">{{ $schedule->type }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="py-2 text-center">No backups</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </x-card>

        @if($recent_logs->count())
            <x-card>
                <h2 class="text-lg font-semibold mb-2">Recent Activity</h2>
                <ul>
                    @foreach($recent_logs as $log)
                        <li class="border-b py-1 text-sm">{{ $log->created_at->format('Y-m-d H:i') }} - {{ $log->action }}</li>
                    @endforeach
                </ul>
            </x-card>
        @endif
    </div>

    @can('manage-resources')
        <x-card class="mt-6">
            <h2 class="text-lg font-semibold mb-2">Quick Actions</h2>
            <div class="flex flex-wrap gap-2">
                <a href="{{ route('backupservers.create') }}" class="px-3 py-2 bg-blue-500 text-white rounded">Add Backup Server</a>
                <a href="{{ route('clientservers.create') }}" class="px-3 py-2 bg-blue-500 text-white rounded">Add Client Server</a>
            </div>
        </x-card>
    @endcan
@endsection
