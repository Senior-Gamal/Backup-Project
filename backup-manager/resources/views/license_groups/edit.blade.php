@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Edit License Group</h1>
    <form action="{{ route('license-groups.update', $licenseGroup) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $licenseGroup->name) }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
