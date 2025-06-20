@extends('layouts.app')

@section('content')
    <h1>Welcome to Backup Manager</h1>
    @if (Route::has('login'))
        <a href="{{ route('login') }}">Go to login</a>
    @endif
@endsection
