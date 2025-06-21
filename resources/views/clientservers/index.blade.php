@extends('layouts.app')

@section('content')
    <h1>Client Servers</h1>
    <a href="{{ route('clientservers.create') }}">Add Client Server</a>
    <ul>
        @foreach ($servers as $server)
            <li>
                {{ $server->hostname }} ({{ $server->ip_address }})
                <a href="{{ route('clientservers.edit', $server) }}">Edit</a>
                <form method="POST" action="{{ route('clientservers.destroy', $server) }}" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
