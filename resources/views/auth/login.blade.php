@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto">
    <h2 class="text-2xl font-bold mb-4">Login</h2>
    <form method="POST" action="{{ url('/login') }}" class="bg-white dark:bg-gray-700 shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        @if($errors->any())
            <div class="mb-4 text-red-500">{{ $errors->first() }}</div>
        @endif
        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-200 text-sm font-bold mb-2">Email</label>
            <input type="email" name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 dark:text-gray-200 text-sm font-bold mb-2">Password</label>
            <input type="password" name="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
        </div>
        <div class="flex items-center justify-between">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">Login</button>
        </div>
    </form>
</div>
@endsection
