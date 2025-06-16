@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Server Backup</h1>
    <form method="POST" action="{{ route('server-backups.store') }}">
        @csrf
        <div class="mb-3">
            <label for="server_id" class="form-label">Server</label>
            <select name="server_id" id="server_id" class="form-select" required>
                <option value="">Select</option>
                @foreach($servers as $server)
                    <option value="{{ $server->id }}" @selected(old('server_id') == $server->id)>{{ $server->hostname }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="backup_type" class="form-label">Backup Type</label>
            <input type="text" name="backup_type" id="backup_type" class="form-control" value="{{ old('backup_type') }}" required>
        </div>
        <div class="mb-3">
            <label for="backup_server_id" class="form-label">Backup Server</label>
            <select name="backup_server_id" id="backup_server_id" class="form-select" required>
                <option value="">Select</option>
                @foreach($backupServers as $server)
                    <option value="{{ $server->id }}" @selected(old('backup_server_id') == $server->id)>{{ $server->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" id="username" class="form-control" value="{{ old('username') }}" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="text" name="password" id="password" class="form-control" value="{{ old('password') }}" required>
        </div>
        <div class="mb-3">
            <label for="schedule_day" class="form-label">Schedule Day</label>
            <input type="number" name="schedule_day" id="schedule_day" class="form-control" value="{{ old('schedule_day') }}">
        </div>
        <div class="mb-3">
            <label for="schedule_hour" class="form-label">Schedule Hour</label>
            <input type="number" name="schedule_hour" id="schedule_hour" class="form-control" value="{{ old('schedule_hour') }}">
        </div>
        <div class="mb-3">
            <label for="timezone" class="form-label">Timezone</label>
            <input type="text" name="timezone" id="timezone" class="form-control" value="{{ old('timezone', 'UTC') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('server-backups.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
