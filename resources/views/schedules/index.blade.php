@extends('layouts.app')

@section('content')
    <h1>Backup Schedules</h1>
    <a href="{{ route('schedules.create') }}">Add Schedule</a>
    <ul>
        @foreach ($schedules as $schedule)
            <li>
                {{ $schedule->server->hostname }} - {{ $schedule->type }} - {{ $schedule->scheduled_at }}
                <form method="POST" action="{{ route('schedules.destroy', $schedule) }}" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
