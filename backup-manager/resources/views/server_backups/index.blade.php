@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between mb-3">
        <h1>Backup Assignments</h1>
        @if(auth()->user()->role !== 'viewer')
            <a href="{{ route('server-backups.create') }}" class="btn btn-primary">Add</a>
        @endif
    </div>
    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Server</th>
                <th>Backup Server</th>
                <th>Type</th>
                <th>Hour</th>
                <th>Day</th>
                @if(auth()->user()->role !== 'viewer')
                <th>Actions</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @forelse($assignments as $assign)
            <tr>
                <td>{{ $assign->id }}</td>
                <td>{{ $assign->server->hostname ?? '' }}</td>
                <td>{{ $assign->backupServer->name ?? '' }}</td>
                <td>{{ $assign->backup_type }}</td>
                <td>{{ $assign->schedule_hour }}</td>
                <td>{{ $assign->day_of_week }}</td>
                @if(auth()->user()->role !== 'viewer')
                <td>
                    <a href="{{ route('server-backups.edit', $assign) }}" class="btn btn-sm btn-secondary">Edit</a>
                    @if(auth()->user()->role === 'admin')
                    <form action="{{ route('server-backups.destroy', $assign) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                    @endif
                </td>
                @endif
            </tr>
            @empty
            <tr><td colspan="7" class="text-center">No assignments</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
