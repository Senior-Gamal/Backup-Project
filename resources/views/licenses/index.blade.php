@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Licenses</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>License Key</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($licenses as $license)
                <tr>
                    <td>{{ $license->id }}</td>
                    <td>{{ $license->name }}</td>
                    <td>{{ $license->license_key }}</td>
                    <td>{{ $license->status }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">No licenses found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
