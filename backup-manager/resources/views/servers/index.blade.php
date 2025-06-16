@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between mb-3">
        <h1>Servers</h1>
        @if(auth()->user()->role !== 'viewer')
            <a href="{{ route('servers.create') }}" class="btn btn-primary">Add Server</a>
        @endif
    </div>
    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Hostname</th>
                <th>IP Address</th>
                <th>Timezone</th>
                @if(auth()->user()->role !== 'viewer')
                    <th>Actions</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @forelse($servers as $server)
            <tr>
                <td>{{ $server->id }}</td>
                <td>{{ $server->hostname }}</td>
                <td>{{ $server->ip }}</td>
                <td>{{ $server->timezone }}</td>
                @if(auth()->user()->role !== 'viewer')
                <td>
                    <a href="{{ route('servers.edit', $server) }}" class="btn btn-sm btn-secondary">Edit</a>
                    @if(auth()->user()->role === 'admin')
                    <form action="{{ route('servers.destroy', $server) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this server?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                    @endif
                </td>
                @endif
            </tr>
            @empty
            <tr>
                <td colspan="{{ auth()->user()->role !== 'viewer' ? 5 : 4 }}" class="text-center">No servers added yet</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
