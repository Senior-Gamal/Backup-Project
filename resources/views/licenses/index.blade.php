@extends('layouts.app')

@section('content')
    <h1>Licenses</h1>
    <a href="{{ route('licenses.create') }}">Add License</a>
    <ul>
        @foreach ($licenses as $license)
            <li>
                {{ $license->key }} - {{ optional($license->expiry_date)->format('Y-m-d') }} - {{ $license->clientServer->hostname }}
                <a href="{{ route('licenses.edit', $license) }}">Edit</a>
                <form method="POST" action="{{ route('licenses.destroy', $license) }}" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
