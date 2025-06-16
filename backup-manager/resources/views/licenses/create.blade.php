@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Add License</h1>
    <form action="{{ route('licenses.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Server</label>
            <select name="server_id" class="form-select" required>
                @foreach($servers as $server)
                    <option value="{{ $server->id }}">{{ $server->hostname }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">License Group</label>
            <select name="license_group_id" class="form-select" required>
                @foreach($groups as $group)
                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">License Key</label>
            <input type="text" name="license_key" class="form-control" value="{{ old('license_key') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Expires At</label>
            <input type="date" name="expires_at" class="form-control" value="{{ old('expires_at') }}">
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
