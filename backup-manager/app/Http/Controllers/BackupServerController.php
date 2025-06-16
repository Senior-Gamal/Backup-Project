<?php
namespace App\Http\Controllers;

use App\Models\BackupServer;
use Illuminate\Http\Request;

class BackupServerController extends Controller
{
    public function index()
    {
        $servers = BackupServer::all();
        return view('backup_servers.index', compact('servers'));
    }

    public function create()
    {
        return view('backup_servers.create');
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required',
            'ip' => 'nullable|ip',
            'path' => 'nullable',
            'type' => 'required|in:full,incremental,db,nas',
        ]);

        BackupServer::create($validated);
        return redirect()->route('backup-servers.index')->with('success', 'Backup server created');
    }

    public function edit(BackupServer $backupServer)
    {
        return view('backup_servers.edit', compact('backupServer'));
    }

    public function update(Request $request, BackupServer $backupServer)
    {

        $validated = $request->validate([
            'name' => 'required',
            'ip' => 'nullable|ip',
            'path' => 'nullable',
            'type' => 'required|in:full,incremental,db,nas',
        ]);

        $backupServer->update($validated);
        return redirect()->route('backup-servers.index')->with('success', 'Backup server updated');
    }

    public function destroy(BackupServer $backupServer)
    {
        $backupServer->delete();
        return redirect()->route('backup-servers.index')->with('success', 'Backup server deleted');
    }

}
