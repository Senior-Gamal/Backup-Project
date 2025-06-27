@extends('layouts.app')

@section('content')
    <h1>Add License</h1>
    <form method="POST" action="{{ route('licenses.store') }}">
        @csrf
        <label>Key</label>
        <input type="text" name="key" value="{{ old('key') }}" required>
        <label>Expiry Date</label>
        <input type="date" name="expiry_date" value="{{ old('expiry_date') }}">
        <label>Client Server</label>
        <select name="client_server_id" required>
            @foreach ($clients as $id => $name)
                <option value="{{ $id }}" @selected(old('client_server_id') == $id)>{{ $name }}</option>
            @endforeach
        </select>
        <button type="submit">Save</button>
    </form>
@endsection
