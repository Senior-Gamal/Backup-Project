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
            <label class="form-label">Timezone</label>
            <input type="text" name="timezone" class="form-control" value="{{ old('timezone') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
