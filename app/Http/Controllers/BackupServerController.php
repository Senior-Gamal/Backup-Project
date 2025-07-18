<?php

namespace App\Http\Controllers;

use App\Models\BackupServer;
use App\Models\ActivityLog;
use Illuminate\Http\Request;

class BackupServerController extends Controller
{
    public function index()
    {
        $servers = BackupServer::all();
        return view('backupservers.index', compact('servers'));
    }

    public function create()
    {
        return view('backupservers.create');
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);
        $server = BackupServer::create($data);
        ActivityLog::create([
            'user_id' => $request->user()->id,
            'action' => "Created backup server {$server->hostname}",
        ]);
        return redirect()->route('backupservers.index');
    }

    public function edit(BackupServer $backupserver)
    {
        return view('backupservers.edit', compact('backupserver'));
    }

    public function update(Request $request, BackupServer $backupserver)
    {
        $data = $this->validateData($request);
        $backupserver->update($data);
        ActivityLog::create([
            'user_id' => $request->user()->id,
            'action' => "Updated backup server {$backupserver->hostname}",
        ]);
        return redirect()->route('backupservers.index');
    }

    public function destroy(BackupServer $backupserver)
    {
        $name = $backupserver->hostname;
        $backupserver->delete();
        ActivityLog::create([
            'user_id' => auth()->id(),
            'action' => "Deleted backup server {$name}",
        ]);
        return redirect()->route('backupservers.index');
    }

    protected function validateData(Request $request): array
    {
        return $request->validate([
            'hostname' => 'required|string|max:255',
            'ip_address' => 'required|string|max:255',
            'dns' => 'nullable|string|max:255',
            'disk_space' => 'nullable|string|max:255',
            'connection_speed' => 'nullable|string|max:255',
            'timezone' => 'required|string|max:255',
            'vnc_user' => 'nullable|string|max:255',
            'control_panel' => 'nullable|string|max:255',
            'license_group' => 'nullable|string|max:255',
            'license' => 'nullable|string|max:255',
            'internal_backup' => 'boolean',
            'secret_code' => 'nullable|string|max:255',
            'node_group' => 'nullable|string|max:255',
            'datacenter' => 'nullable|string|max:255',
            'client_number' => 'nullable|string|max:255',
            'last_data_update' => 'nullable|date',
            'notes' => 'nullable|string',
        ]);
    }
}
