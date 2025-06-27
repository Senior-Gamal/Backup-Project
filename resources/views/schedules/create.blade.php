@extends('layouts.app')

@section('content')
    <h1 class="text-xl font-semibold mb-4">Add Backup Schedule</h1>
    <form method="POST" action="{{ route('schedules.store') }}" class="bg-white shadow rounded p-6 max-w-lg">
        @csrf
        <div class="mb-4">
            <label class="block text-sm mb-1">Backup Server</label>
            <select name="backup_server_id" required class="w-full border rounded p-2">
                @foreach ($servers as $id => $name)
                    <option value="{{ $id }}" @selected(old('backup_server_id') == $id)>{{ $name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label class="block text-sm mb-1">Type</label>
            <input type="text" name="type" value="{{ old('type') }}" required class="w-full border rounded p-2">
        </div>
        <div class="mb-4">
            <label class="block text-sm mb-1">Scheduled At</label>
            <input type="datetime-local" name="scheduled_at" value="{{ old('scheduled_at') }}" required class="w-full border rounded p-2">
            @error('scheduled_at')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror
        </div>
        <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded">Save</button>
    </form>
@endsection

