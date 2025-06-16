@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Server</h1>
    <form method="POST" action="{{ route('servers.store') }}">
        @csrf
        <div class="mb-3">
            <label for="hostname" class="form-label">Hostname</label>
            <input type="text" name="hostname" id="hostname" class="form-control" value="{{ old('hostname') }}" required>
        </div>
        <div class="mb-3">
            <label for="ip_address" class="form-label">IP Address</label>
            <input type="text" name="ip_address" id="ip_address" class="form-control" value="{{ old('ip_address') }}" required>
        </div>
        <div class="mb-3">
            <label for="timezone" class="form-label">Timezone</label>
            <input type="text" name="timezone" id="timezone" class="form-control" value="{{ old('timezone', 'UTC') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('servers.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
