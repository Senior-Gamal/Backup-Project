@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('login') }}" class="bg-white shadow rounded p-6 w-full max-w-sm">
    @csrf
    <div class="mb-4">
        <label class="block text-sm mb-1">Email</label>
        <input type="email" name="email" required autofocus class="w-full border rounded p-2">
    </div>
    <div class="mb-4">
        <label class="block text-sm mb-1">Password</label>
        <input type="password" name="password" required class="w-full border rounded p-2">
    </div>
    <button type="submit" class="w-full bg-gray-800 text-white py-2 rounded">Login</button>
</form>
@endsection

