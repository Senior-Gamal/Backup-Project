@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Client Servers</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>IP Address</th>
                <th>Type</th>
            </tr>
        </thead>
        <tbody>
            @forelse($clientServers as $server)
                <tr>
                    <td>{{ $server->id }}</td>
                    <td>{{ $server->name }}</td>
                    <td>{{ $server->ip_address }}</td>
                    <td>{{ $server->type }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">No client servers found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
