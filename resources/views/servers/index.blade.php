@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Servers</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Hostname</th>
                <th>IP Address</th>
                <th>Timezone</th>
            </tr>
        </thead>
        <tbody>
            @forelse($servers as $server)
                <tr>
                    <td>{{ $server->id }}</td>
                    <td>{{ $server->hostname }}</td>
                    <td>{{ $server->ip_address }}</td>
                    <td>{{ $server->timezone }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">No servers found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
