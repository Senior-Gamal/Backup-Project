@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Edit Backup Assignment</h1>
    <form action="{{ route('server-backups.update', $serverBackup) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Server</label>
            <select name="server_id" class="form-select" required>
                @foreach($servers as $server)
                    <option value="{{ $server->id }}" @selected($serverBackup->server_id == $server->id)>{{ $server->hostname }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Backup Server</label>
            <select name="backup_server_id" class="form-select" required>
                @foreach($backupServers as $bs)
                    <option value="{{ $bs->id }}" @selected($serverBackup->backup_server_id == $bs->id)>{{ $bs->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Backup Type</label>
            <select name="backup_type" class="form-select" required>
                <option value="full" @selected($serverBackup->backup_type==='full')>Full</option>
                <option value="incremental" @selected($serverBackup->backup_type==='incremental')>Incremental</option>
                <option value="db" @selected($serverBackup->backup_type==='db')>DB</option>
                <option value="nas" @selected($serverBackup->backup_type==='nas')>NAS</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Schedule Hour (0-23)</label>
            <input type="number" name="schedule_hour" class="form-control" value="{{ old('schedule_hour', $serverBackup->schedule_hour) }}" min="0" max="23" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Day of Week (0-6)</label>
            <input type="number" name="day_of_week" class="form-control" value="{{ old('day_of_week', $serverBackup->day_of_week) }}" min="0" max="6">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
