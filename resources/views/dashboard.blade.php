@extends('layouts.app')

@section('content')
    <h1>Dashboard</h1>
    <ul>
        <li>Total Client Servers: {{ $client_servers }}</li>
        <li>Total Backup Servers: {{ $backup_servers }}</li>
        <li>Upcoming Backups Today: {{ $upcoming_backups }}</li>
    </ul>

    <h2>Recent Activity</h2>
    <ul>
        @foreach ($recent_logs as $log)
            <li>{{ $log->created_at }} - {{ $log->action }}</li>
        @endforeach
    </ul>
@endsection
