@extends('layouts.app')

@section('content')
    <h1>Backup Servers</h1>
    <a href="{{ route('backupservers.create') }}">Add Server</a>
    <ul>
        @foreach ($servers as $server)
            <li>{{ $server->hostname }} ({{ $server->ip_address }})</li>
        @endforeach
    </ul>
@endsection
