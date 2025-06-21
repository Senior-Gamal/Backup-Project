@extends('layouts.app')

@section('content')
    <h1>Edit Client Server</h1>
    <form method="POST" action="{{ route('clientservers.update', $clientserver) }}">
        @csrf
        @method('PUT')
        <div>
            <label>Hostname
                <input type="text" name="hostname" value="{{ $clientserver->hostname }}" required>
            </label>
        </div>
        <div>
            <label>IP Address
                <input type="text" name="ip_address" value="{{ $clientserver->ip_address }}" required>
            </label>
        </div>
        <div>
            <label>Location
                <input type="text" name="location" value="{{ $clientserver->location }}">
            </label>
        </div>
        <div>
            <label>Notes
                <textarea name="notes">{{ $clientserver->notes }}</textarea>
            </label>
        </div>
        <button type="submit">Update</button>
    </form>
@endsection
