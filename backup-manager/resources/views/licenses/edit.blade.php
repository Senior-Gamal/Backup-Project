@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Edit License</h1>
    <form action="{{ route('licenses.update', $license) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Server</label>
            <select name="server_id" class="form-select" required>
                @foreach($servers as $server)
                    <option value="{{ $server->id }}" @selected($license->server_id == $server->id)>{{ $server->hostname }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">License Group</label>
            <select name="license_group_id" class="form-select" required>
                @foreach($groups as $group)
                    <option value="{{ $group->id }}" @selected($license->license_group_id == $group->id)>{{ $group->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">License Key</label>
            <input type="text" name="license_key" class="form-control" value="{{ old('license_key', $license->license_key) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Expires At</label>
            <input type="date" name="expires_at" class="form-control" value="{{ old('expires_at', $license->expires_at) }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
