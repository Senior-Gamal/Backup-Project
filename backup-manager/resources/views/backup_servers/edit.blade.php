@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Edit Backup Server</h1>
    <form action="{{ route('backup-servers.update', $backupServer) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $backupServer->name) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">IP Address</label>
            <input type="text" name="ip" class="form-control" value="{{ old('ip', $backupServer->ip) }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Path</label>
            <input type="text" name="path" class="form-control" value="{{ old('path', $backupServer->path) }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Type</label>
            <select name="type" class="form-select" required>
                <option value="full" @selected($backupServer->type==='full')>Full</option>
                <option value="incremental" @selected($backupServer->type==='incremental')>Incremental</option>
                <option value="db" @selected($backupServer->type==='db')>DB</option>
                <option value="nas" @selected($backupServer->type==='nas')>NAS</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
