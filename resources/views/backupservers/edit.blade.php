@extends('layouts.app')

@section('content')
    <h1>Edit Backup Server</h1>
    <form method="POST" action="{{ route('backupservers.update', $backupserver) }}">
        @csrf
        @method('PUT')
        <label>Hostname</label>
        <input type="text" name="hostname" value="{{ old('hostname', $backupserver->hostname) }}" required>
        <label>IP Address</label>
        <input type="text" name="ip_address" value="{{ old('ip_address', $backupserver->ip_address) }}" required>
        <label>DNS</label>
        <input type="text" name="dns" value="{{ old('dns', $backupserver->dns) }}">
        <label>Disk Space</label>
        <input type="text" name="disk_space" value="{{ old('disk_space', $backupserver->disk_space) }}">
        <label>Connection Speed</label>
        <input type="text" name="connection_speed" value="{{ old('connection_speed', $backupserver->connection_speed) }}">
        <label>Timezone</label>
        <input type="text" name="timezone" value="{{ old('timezone', $backupserver->timezone) }}" required>
        <label>VNC User</label>
        <input type="text" name="vnc_user" value="{{ old('vnc_user', $backupserver->vnc_user) }}">
        <label>Control Panel</label>
        <input type="text" name="control_panel" value="{{ old('control_panel', $backupserver->control_panel) }}">
        <label>License Group</label>
        <input type="text" name="license_group" value="{{ old('license_group', $backupserver->license_group) }}">
        <label>License</label>
        <input type="text" name="license" value="{{ old('license', $backupserver->license) }}">
        <label>Internal Backup</label>
        <input type="checkbox" name="internal_backup" value="1" {{ old('internal_backup', $backupserver->internal_backup) ? 'checked' : '' }}>
        <label>Secret Code</label>
        <input type="text" name="secret_code" value="{{ old('secret_code', $backupserver->secret_code) }}">
        <label>Node Group</label>
        <input type="text" name="node_group" value="{{ old('node_group', $backupserver->node_group) }}">
        <label>Datacenter</label>
        <input type="text" name="datacenter" value="{{ old('datacenter', $backupserver->datacenter) }}">
        <label>Client Number</label>
        <input type="text" name="client_number" value="{{ old('client_number', $backupserver->client_number) }}">
        <label>Last Data Update</label>
        <input type="date" name="last_data_update" value="{{ old('last_data_update', optional($backupserver->last_data_update)->format('Y-m-d')) }}">
        <label>Notes</label>
        <textarea name="notes">{{ old('notes', $backupserver->notes) }}</textarea>
        <button type="submit">Save</button>
    </form>
@endsection
