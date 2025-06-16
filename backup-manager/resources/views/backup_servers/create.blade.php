@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Add Backup Server</h1>
    <form action="{{ route('backup-servers.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">IP Address</label>
            <input type="text" name="ip" class="form-control" value="{{ old('ip') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Path</label>
            <input type="text" name="path" class="form-control" value="{{ old('path') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Type</label>
            <select name="type" class="form-select" required>
                <option value="full">Full</option>
                <option value="incremental">Incremental</option>
                <option value="db">DB</option>
                <option value="nas">NAS</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
