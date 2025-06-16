@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between mb-3">
        <h1>Licenses</h1>
        @if(auth()->user()->role !== 'viewer')
            <a href="{{ route('licenses.create') }}" class="btn btn-primary">Add</a>
        @endif
    </div>
    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Server</th>
                <th>Group</th>
                <th>Key</th>
                <th>Expires</th>
                @if(auth()->user()->role !== 'viewer')
                <th>Actions</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @forelse($licenses as $lic)
            <tr>
                <td>{{ $lic->id }}</td>
                <td>{{ $lic->server->hostname ?? '' }}</td>
                <td>{{ $lic->licenseGroup->name ?? '' }}</td>
                <td>{{ $lic->license_key }}</td>
                <td>{{ $lic->expires_at }}</td>
                @if(auth()->user()->role !== 'viewer')
                <td>
                    <a href="{{ route('licenses.edit', $lic) }}" class="btn btn-sm btn-secondary">Edit</a>
                    @if(auth()->user()->role === 'admin')
                    <form action="{{ route('licenses.destroy', $lic) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                    @endif
                </td>
                @endif
            </tr>
            @empty
            <tr><td colspan="6" class="text-center">No licenses</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
