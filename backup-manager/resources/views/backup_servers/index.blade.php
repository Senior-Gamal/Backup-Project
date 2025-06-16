@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between mb-3">
        <h1>Backup Servers</h1>
        @if(auth()->user()->role !== 'viewer')
            <a href="{{ route('backup-servers.create') }}" class="btn btn-primary">Add</a>
        @endif
    </div>
    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>IP</th>
                <th>Type</th>
                @if(auth()->user()->role !== 'viewer')
                    <th>Actions</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @forelse($servers as $srv)
            <tr>
                <td>{{ $srv->id }}</td>
                <td>{{ $srv->name }}</td>
                <td>{{ $srv->ip }}</td>
                <td>{{ ucfirst($srv->type) }}</td>
                @if(auth()->user()->role !== 'viewer')
                <td>
                    <a href="{{ route('backup-servers.edit', $srv) }}" class="btn btn-sm btn-secondary">Edit</a>
                    @if(auth()->user()->role === 'admin')
                    <form action="{{ route('backup-servers.destroy', $srv) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                    @endif
                </td>
                @endif
            </tr>
            @empty
            <tr><td colspan="5" class="text-center">No backup servers</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
