@extends('layouts.app')

@section('content')
    <h1>Add Backup Schedule</h1>
    <form method="POST" action="{{ route('schedules.store') }}">
        @csrf
        <label>Backup Server</label>
        <select name="backup_server_id" required>
            @foreach ($servers as $id => $name)
                <option value="{{ $id }}" @selected(old('backup_server_id') == $id)>{{ $name }}</option>
            @endforeach
        </select>
        <label>Type</label>
        <input type="text" name="type" value="{{ old('type') }}" required>
        <label>Scheduled At</label>
        <input type="datetime-local" name="scheduled_at" value="{{ old('scheduled_at') }}" required>
        @error('scheduled_at')<div>{{ $message }}</div>@enderror
        <button type="submit">Save</button>
    </form>
@endsection
