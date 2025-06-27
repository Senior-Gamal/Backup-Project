@extends('layouts.app')

@section('content')
    <h1>Edit License</h1>
    <form method="POST" action="{{ route('licenses.update', $license) }}">
        @csrf
        @method('PUT')
        <label>Key</label>
        <input type="text" name="key" value="{{ old('key', $license->key) }}" required>
        <label>Expiry Date</label>
        <input type="date" name="expiry_date" value="{{ old('expiry_date', optional($license->expiry_date)->format('Y-m-d')) }}">
        <label>Client Server</label>
        <select name="client_server_id" required>
            @foreach ($clients as $id => $name)
                <option value="{{ $id }}" @selected(old('client_server_id', $license->client_server_id) == $id)>{{ $name }}</option>
            @endforeach
        </select>
        <button type="submit">Save</button>
    </form>
@endsection
