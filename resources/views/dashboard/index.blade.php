@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-6">Dashboard</h2>

<div class="grid grid-cols-1 md:grid-cols-4 gap-4">
    <x-overview-card title="Total Client Servers" :count="$totalClientServers" />
    <x-overview-card title="Total Backup Servers" :count="$totalBackupServers" />
    <x-overview-card title="Total Active Licenses" :count="$totalActiveLicenses" />
    <x-overview-card title="Upcoming Backups" :count="$upcomingBackups" />
</div>

@if(in_array(auth()->user()->role, ['admin','manager']))
<div class="mt-8">
    <h3 class="font-bold mb-2">Backup Schedule Snapshot</h3>
    <x-backup-schedule-table :servers="$servers" />
</div>

<div class="mt-8">
    <h3 class="font-bold mb-2">Recent Activity</h3>
    <x-activity-log :activities="$activities" />
</div>
@endif

<div class="mt-8">
    <h3 class="font-bold mb-2">System Health</h3>
    <x-system-health />
</div>

@if(in_array(auth()->user()->role, ['admin','manager']))
<div class="mt-8">
    <h3 class="font-bold mb-2">Quick Actions</h3>
    <div class="flex flex-wrap gap-2">
        <x-quick-action :href="route('backupservers.create')">Add Backup Server</x-quick-action>
    </div>
</div>
@endif
@endsection
