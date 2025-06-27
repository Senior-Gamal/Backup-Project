@extends('layouts.app')

@section('content')
    <h1 class="text-xl font-semibold mb-4">Edit License</h1>
    <form method="POST" action="{{ route('licenses.update', $license) }}" class="bg-white shadow rounded p-6 max-w-lg">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block text-sm mb-1">Key</label>
            <input type="text" name="key" value="{{ old('key', $license->key) }}" required class="w-full border rounded p-2">
        </div>
        <div class="mb-4">
            <label class="block text-sm mb-1">Expiry Date</label>
            <input type="date" name="expiry_date" value="{{ old('expiry_date', optional($license->expiry_date)->format('Y-m-d')) }}" class="w-full border rounded p-2">
        </div>
        <div class="mb-4">
            <label class="block text-sm mb-1">Client Server</label>
            <select name="client_server_id" required class="w-full border rounded p-2">
                @foreach ($clients as $id => $name)
                    <option value="{{ $id }}" @selected(old('client_server_id', $license->client_server_id) == $id)>{{ $name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded">Save</button>
    </form>
@endsection

