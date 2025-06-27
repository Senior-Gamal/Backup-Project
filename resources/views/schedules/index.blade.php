@extends('layouts.app')

@section('content')
    <h1 class="text-xl font-semibold mb-4">Backup Schedules</h1>
    <a href="{{ route('schedules.create') }}" class="inline-block mb-4 bg-gray-800 text-white px-4 py-2 rounded">Add Schedule</a>
    <table class="min-w-full bg-white shadow rounded">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-4 py-2 text-left text-sm">Server</th>
                <th class="px-4 py-2 text-left text-sm">Type</th>
                <th class="px-4 py-2 text-left text-sm">Time</th>
                <th class="px-4 py-2"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($schedules as $schedule)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $schedule->server->hostname }}</td>
                    <td class="px-4 py-2">{{ $schedule->type }}</td>
                    <td class="px-4 py-2">{{ $schedule->scheduled_at }}</td>
                    <td class="px-4 py-2">
                        <form method="POST" action="{{ route('schedules.destroy', $schedule) }}">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

