@extends('layouts.app')

@section('content')
    <div class="space-y-6">
        <h1 class="text-3xl font-bold">Dashboard</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <x-card class="flex items-center">
                <div class="p-3 bg-blue-100 rounded-full">
                    <svg class="h-6 w-6 text-blue-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5h18M3 12h18M3 19h18"/></svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-500">Client Servers</p>
                    <p class="text-2xl font-semibold">{{ $client_servers }}</p>
                </div>
            </x-card>

            <x-card class="flex items-center">
                <div class="p-3 bg-green-100 rounded-full">
                    <svg class="h-6 w-6 text-green-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-500">Backup Servers</p>
                    <p class="text-2xl font-semibold">{{ $backup_servers }}</p>
                </div>
            </x-card>

            <x-card class="flex items-center">
                <div class="p-3 bg-purple-100 rounded-full">
                    <svg class="h-6 w-6 text-purple-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8c1.104 0 2-.896 2-2s-.896-2-2-2-2 .896-2 2 .896 2 2 2zm0 2c-1.105 0-2 .895-2 2s.895 2 2 2 2-.895 2-2-.895-2-2-2zm0 6c-1.105 0-2 .895-2 2s.895 2 2 2 2-.895 2-2-.895-2-2-2z"/></svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-500">Active Licenses</p>
                    <p class="text-2xl font-semibold">{{ $licenses }}</p>
                </div>
            </x-card>

            <x-card class="flex items-center">
                <div class="p-3 bg-orange-100 rounded-full">
                    <svg class="h-6 w-6 text-orange-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2z"/></svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-500">Backups Today</p>
                    <p class="text-2xl font-semibold">{{ $today_schedules->count() }}</p>
                </div>
            </x-card>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
            <x-card>
                <h2 class="text-lg font-semibold mb-2">Today's Backup Schedule</h2>
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
                                <td colspan="3" class="py-2 text-center text-gray-500">No backups</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </x-card>

            <x-card>
                <h2 class="text-lg font-semibold mb-2">Recent Activity</h2>
                <ul class="space-y-1">
                    @forelse($recent_logs as $log)
                        <li class="text-sm border-b pb-1">{{ $log->created_at->format('Y-m-d H:i') }} - {{ $log->action }}</li>
                    @empty
                        <li class="text-sm text-gray-500">No activity yet</li>
                    @endforelse
                </ul>
            </x-card>

            <x-card>
                <h2 class="text-lg font-semibold mb-2">System Info</h2>
                <ul class="text-sm space-y-1">
                    <li>PHP: {{ $system_info['php_version'] }}</li>
                    <li>Timezone: {{ $system_info['timezone'] }}</li>
                    <li>Disk Free: {{ number_format($system_info['disk_free'] / (1024**3), 2) }} GB</li>
                </ul>
            </x-card>
        </div>

        @can('manage-resources')
            <x-card>
                <h2 class="text-lg font-semibold mb-2">Quick Actions</h2>
                <div class="flex flex-wrap gap-2">
                    <a href="{{ route('backupservers.create') }}" class="px-3 py-2 bg-blue-500 text-white rounded">Add Backup Server</a>
                    <a href="{{ route('clientservers.create') }}" class="px-3 py-2 bg-blue-500 text-white rounded">Add Client Server</a>
                    <a href="{{ route('licenses.create') }}" class="px-3 py-2 bg-blue-500 text-white rounded">Assign License</a>
                    <a href="{{ route('users.create') }}" class="px-3 py-2 bg-blue-500 text-white rounded">Add User</a>
                </div>
            </x-card>
        @endcan
    </div>
@endsection
