@extends('layouts.app')

@section('content')
    <h1 class="text-xl font-bold mb-4">Dashboard</h1>
    <ul class="mb-4">
        <li>Total Client Servers: {{ $client_servers }}</li>
        <li>Total Backup Servers: {{ $backup_servers }}</li>
        <li>Total Licenses: {{ $licenses }}</li>
    </ul>

    <h2 class="font-semibold">Today's Backups</h2>
    <ul class="mb-4">
        @forelse ($todays_schedules as $schedule)
            <li>{{ $schedule->scheduled_at }} - {{ $schedule->server->hostname }} - {{ $schedule->type }}</li>
        @empty
            <li>No backups scheduled today.</li>
        @endforelse
    </ul>

    <h2 class="font-semibold">Recent Activity</h2>
    <ul>
        @foreach ($recent_logs as $log)
            <li>{{ $log->created_at }} - {{ $log->action }}</li>
        @endforeach
    </ul>
@endsection
