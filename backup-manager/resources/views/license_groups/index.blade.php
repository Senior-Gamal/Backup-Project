@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between mb-3">
        <h1>License Groups</h1>
        @if(auth()->user()->role !== 'viewer')
            <a href="{{ route('license-groups.create') }}" class="btn btn-primary">Add</a>
        @endif
    </div>
    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Name</th>
                @if(auth()->user()->role !== 'viewer')
                <th>Actions</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @forelse($groups as $group)
            <tr>
                <td>{{ $group->id }}</td>
                <td>{{ $group->name }}</td>
                @if(auth()->user()->role !== 'viewer')
                <td>
                    <a href="{{ route('license-groups.edit', $group) }}" class="btn btn-sm btn-secondary">Edit</a>
                    @if(auth()->user()->role === 'admin')
                    <form action="{{ route('license-groups.destroy', $group) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                    @endif
                </td>
                @endif
            </tr>
            @empty
            <tr><td colspan="3" class="text-center">No license groups</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
