@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Client Server</h1>
    <form method="POST" action="{{ route('client-servers.store') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
        </div>
        <div class="mb-3">
            <label for="ip_address" class="form-label">IP Address</label>
            <input type="text" name="ip_address" id="ip_address" class="form-control" value="{{ old('ip_address') }}" required>
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <input type="text" name="type" id="type" class="form-control" value="{{ old('type') }}" required>
        </div>
        <div class="mb-3">
            <label for="timezone" class="form-label">Timezone</label>
            <input type="text" name="timezone" id="timezone" class="form-control" value="{{ old('timezone', 'UTC') }}" required>
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" id="username" class="form-control" value="{{ old('username') }}" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="text" name="password" id="password" class="form-control" value="{{ old('password') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('client-servers.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
