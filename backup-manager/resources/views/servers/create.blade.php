@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Add Server</h1>
    <form action="{{ route('servers.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Hostname</label>
            <input type="text" name="hostname" class="form-control" value="{{ old('hostname') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">IP Address</label>
            <input type="text" name="ip" class="form-control" value="{{ old('ip') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">DNS</label>
            <input type="text" name="dns" class="form-control" value="{{ old('dns') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">VNC</label>
            <input type="text" name="vnc" class="form-control" value="{{ old('vnc') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Control Panel</label>
            <select name="control_panel" class="form-select">
                <option value="">None</option>
                <option value="cPanel">cPanel</option>
                <option value="Plesk">Plesk</option>
                <option value="DirectAdmin">DirectAdmin</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Backup Time</label>
            <input type="time" name="backup_time" class="form-control" value="{{ old('backup_time') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control" value="{{ old('username') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="text" name="password" class="form-control" value="{{ old('password') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">License Reference</label>
            <input type="text" name="license_reference" class="form-control" value="{{ old('license_reference') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Node Group</label>
            <input type="text" name="node_group" class="form-control" value="{{ old('node_group') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Data Center</label>
            <input type="text" name="data_center" class="form-control" value="{{ old('data_center') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Timezone</label>
            <select name="timezone" class="form-select" required>
                <option value="UTC" @selected(old('timezone')==='UTC')>UTC</option>
                <option value="America/New_York" @selected(old('timezone')==='America/New_York')>America/New_York</option>
                <option value="Europe/London" @selected(old('timezone')==='Europe/London')>Europe/London</option>
                <option value="Asia/Tokyo" @selected(old('timezone')==='Asia/Tokyo')>Asia/Tokyo</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Notes</label>
            <textarea name="notes" class="form-control">{{ old('notes') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
