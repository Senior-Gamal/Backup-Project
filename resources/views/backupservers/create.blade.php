@extends('layouts.app')

@section('content')
    <h1>Add Backup Server</h1>
    <form method="POST" action="{{ route('backupservers.store') }}">
        @csrf
        <label>Hostname</label>
        <input type="text" name="hostname" required>
        <label>IP Address</label>
        <input type="text" name="ip_address" required>
        <label>Timezone</label>
        <input type="text" name="timezone" required>
        <label>Notes</label>
        <textarea name="notes"></textarea>
        <button type="submit">Save</button>
    </form>
@endsection
