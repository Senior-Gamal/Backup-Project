@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Edit Server</h1>
    <form action="{{ route('servers.update', $server) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Hostname</label>
            <input type="text" name="hostname" class="form-control" value="{{ old('hostname', $server->hostname) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">IP Address</label>
            <input type="text" name="ip" class="form-control" value="{{ old('ip', $server->ip) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">DNS</label>
            <input type="text" name="dns" class="form-control" value="{{ old('dns', $server->dns) }}">
        </div>
        <div class="mb-3">
            <label class="form-label">VNC</label>
            <input type="text" name="vnc" class="form-control" value="{{ old('vnc', $server->vnc) }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Control Panel</label>
            <select name="control_panel" class="form-select">
                <option value="" @selected($server->control_panel==='')>None</option>
                <option value="cPanel" @selected($server->control_panel==='cPanel')>cPanel</option>
                <option value="Plesk" @selected($server->control_panel==='Plesk')>Plesk</option>
                <option value="DirectAdmin" @selected($server->control_panel==='DirectAdmin')>DirectAdmin</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Backup Time</label>
            <input type="time" name="backup_time" class="form-control" value="{{ old('backup_time', $server->backup_time) }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control" value="{{ old('username', $server->username) }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="text" name="password" class="form-control" value="{{ old('password', $server->password) }}">
        </div>
        <div class="mb-3">
            <label class="form-label">License Reference</label>
            <input type="text" name="license_reference" class="form-control" value="{{ old('license_reference', $server->license_reference) }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Node Group</label>
            <input type="text" name="node_group" class="form-control" value="{{ old('node_group', $server->node_group) }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Data Center</label>
            <input type="text" name="data_center" class="form-control" value="{{ old('data_center', $server->data_center) }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Timezone</label>
            <select name="timezone" class="form-select" required>
                <option value="UTC" @selected(old('timezone', $server->timezone)==='UTC')>UTC</option>
                <option value="America/New_York" @selected(old('timezone', $server->timezone)==='America/New_York')>America/New_York</option>
                <option value="Europe/London" @selected(old('timezone', $server->timezone)==='Europe/London')>Europe/London</option>
                <option value="Asia/Tokyo" @selected(old('timezone', $server->timezone)==='Asia/Tokyo')>Asia/Tokyo</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Notes</label>
            <textarea name="notes" class="form-control">{{ old('notes', $server->notes) }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
