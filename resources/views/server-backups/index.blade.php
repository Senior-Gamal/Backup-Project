@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Server Backups</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Server</th>
                <th>Backup Server</th>
                <th>Type</th>
                <th>Schedule</th>
            </tr>
        </thead>
        <tbody>
            @forelse($serverBackups as $backup)
                <tr>
                    <td>{{ $backup->id }}</td>
                    <td>{{ $backup->server->hostname ?? 'N/A' }}</td>
                    <td>{{ $backup->backupServer->name ?? 'N/A' }}</td>
                    <td>{{ $backup->backup_type }}</td>
                    <td>{{ $backup->schedule_day }}-{{ $backup->schedule_hour }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No server backups found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
