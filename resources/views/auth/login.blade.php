@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('login') }}">
    @csrf
    <div>
        <label>Email
            <input type="email" name="email" required autofocus>
        </label>
    </div>
    <div>
        <label>Password
            <input type="password" name="password" required>
        </label>
    </div>
    <button type="submit">Login</button>
</form>
@endsection
