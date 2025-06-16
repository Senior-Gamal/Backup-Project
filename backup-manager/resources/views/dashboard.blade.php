@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Dashboard</h1>
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Servers</h5>
                    <p class="display-6">{{ $serversCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Backup Servers</h5>
                    <p class="display-6">{{ $backupServersCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Users</h5>
                    <p class="display-6">{{ $usersCount }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
