@extends('layouts.app')

@section('content')
<div class="container">
    <h1>License Groups</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @forelse($licenseGroups as $group)
                <tr>
                    <td>{{ $group->id }}</td>
                    <td>{{ $group->name }}</td>
                    <td>{{ $group->description }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">No license groups found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
