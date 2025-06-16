@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add License</h1>
    <form method="POST" action="{{ route('licenses.store') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
        </div>
        <div class="mb-3">
            <label for="license_key" class="form-label">License Key</label>
            <input type="text" name="license_key" id="license_key" class="form-control" value="{{ old('license_key') }}" required>
        </div>
        <div class="mb-3">
            <label for="provider" class="form-label">Provider</label>
            <input type="text" name="provider" id="provider" class="form-control" value="{{ old('provider') }}">
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <input type="text" name="type" id="type" class="form-control" value="{{ old('type') }}">
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <input type="text" name="status" id="status" class="form-control" value="{{ old('status') }}">
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('licenses.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
