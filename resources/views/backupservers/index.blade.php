@extends('layouts.app')

@section('content')
    <h1>Backup Servers</h1>
    <a href="{{ route('backupservers.create') }}">Add Server</a>
    <ul>
        @foreach ($servers as $server)
            <li>
                {{ $server->hostname }} ({{ $server->ip_address }})
                <a href="{{ route('backupservers.edit', $server) }}">Edit</a>
                <form method="POST" action="{{ route('backupservers.destroy', $server) }}" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
