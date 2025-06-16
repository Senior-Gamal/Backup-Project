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
            <label class="form-label">Timezone</label>
            <input type="text" name="timezone" class="form-control" value="{{ old('timezone', $server->timezone) }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
