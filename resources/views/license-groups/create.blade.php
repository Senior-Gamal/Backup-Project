@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add License Group</h1>
    <form method="POST" action="{{ route('license-groups.store') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('license-groups.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
