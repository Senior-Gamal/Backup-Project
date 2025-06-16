<?php
namespace App\Http\Controllers;

use App\Models\BackupServer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BackupServerController extends Controller
{
    public function index()
    {
        $servers = BackupServer::all();
        return view('backup_servers.index', compact('servers'));
    }

    public function create()
    {
        $this->authorizeAction(['admin', 'manager']);
        return view('backup_servers.create');
    }

    public function store(Request $request)
    {
        $this->authorizeAction(['admin', 'manager']);

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
        $this->authorizeAction(['admin', 'manager']);
        return view('backup_servers.edit', compact('backupServer'));
    }

    public function update(Request $request, BackupServer $backupServer)
    {
        $this->authorizeAction(['admin', 'manager']);

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
        $this->authorizeAction(['admin']);
        $backupServer->delete();
        return redirect()->route('backup-servers.index')->with('success', 'Backup server deleted');
    }

    private function authorizeAction(array $roles)
    {
        if (!in_array(Auth::user()->role, $roles)) {
            abort(403);
        }
    }
}
