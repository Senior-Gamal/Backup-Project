@extends('layouts.app')

@section('content')
    <h1 class="text-xl font-semibold mb-4">Licenses</h1>
    <a href="{{ route('licenses.create') }}" class="inline-block mb-4 bg-gray-800 text-white px-4 py-2 rounded">Add License</a>
    <table class="min-w-full bg-white shadow rounded">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-4 py-2 text-left text-sm">Key</th>
                <th class="px-4 py-2 text-left text-sm">Expiry</th>
                <th class="px-4 py-2 text-left text-sm">Server</th>
                <th class="px-4 py-2"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($licenses as $license)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $license->key }}</td>
                    <td class="px-4 py-2">{{ optional($license->expiry_date)->format('Y-m-d') }}</td>
                    <td class="px-4 py-2">{{ $license->clientServer->hostname }}</td>
                    <td class="px-4 py-2">
                        <a href="{{ route('licenses.edit', $license) }}" class="text-blue-600 mr-2">Edit</a>
                        <form method="POST" action="{{ route('licenses.destroy', $license) }}" class="inline">
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

