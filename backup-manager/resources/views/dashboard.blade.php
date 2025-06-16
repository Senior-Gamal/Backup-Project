@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Servers Dashboard</h1>
    <table class="table table-bordered">
        <thead class="table-light">
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
                <td>{{ $server->ip_address ?? $server->ip }}</td>
                <td>{{ $server->timezone }}</td>
            </tr>
        @empty
            <tr><td colspan="4" class="text-center">No servers added yet</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection
