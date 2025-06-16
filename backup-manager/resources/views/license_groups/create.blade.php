@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Add License Group</h1>
    <form action="{{ route('license-groups.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
