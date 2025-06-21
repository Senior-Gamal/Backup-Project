@extends('layouts.app')

@section('content')
    <h1>Create Client Server</h1>
    <form method="POST" action="{{ route('clientservers.store') }}">
        @csrf
        <div>
            <label>Hostname
                <input type="text" name="hostname" required>
            </label>
        </div>
        <div>
            <label>IP Address
                <input type="text" name="ip_address" required>
            </label>
        </div>
        <div>
            <label>Location
                <input type="text" name="location">
            </label>
        </div>
        <div>
            <label>Notes
                <textarea name="notes"></textarea>
            </label>
        </div>
        <button type="submit">Save</button>
    </form>
@endsection
