<?php
namespace App\Http\Controllers;

use App\Models\ServerBackup;
use App\Models\Server;
use App\Models\BackupServer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServerBackupController extends Controller
{
    public function index()
    {
        $assignments = ServerBackup::with(['server', 'backupServer'])->get();
        return view('server_backups.index', compact('assignments'));
    }

    public function create()
    {
        $this->authorizeAction(['admin', 'manager']);
        $servers = Server::all();
        $backupServers = BackupServer::all();
        return view('server_backups.create', compact('servers', 'backupServers'));
    }

    public function store(Request $request)
    {
        $this->authorizeAction(['admin', 'manager']);

        $validated = $request->validate([
            'server_id' => 'required|exists:servers,id',
            'backup_server_id' => 'required|exists:backup_servers,id',
            'backup_type' => 'required|in:full,incremental,db,nas',
            'schedule_hour' => 'required|integer|min:0|max:23',
            'day_of_week' => 'nullable|integer|min:0|max:6',
        ]);

        ServerBackup::create($validated);
        return redirect()->route('server-backups.index')->with('success', 'Assignment created');
    }

    public function edit(ServerBackup $serverBackup)
    {
        $this->authorizeAction(['admin', 'manager']);
        $servers = Server::all();
        $backupServers = BackupServer::all();
        return view('server_backups.edit', compact('serverBackup', 'servers', 'backupServers'));
    }

    public function update(Request $request, ServerBackup $serverBackup)
    {
        $this->authorizeAction(['admin', 'manager']);

        $validated = $request->validate([
            'server_id' => 'required|exists:servers,id',
            'backup_server_id' => 'required|exists:backup_servers,id',
            'backup_type' => 'required|in:full,incremental,db,nas',
            'schedule_hour' => 'required|integer|min:0|max:23',
            'day_of_week' => 'nullable|integer|min:0|max:6',
        ]);

        $serverBackup->update($validated);
        return redirect()->route('server-backups.index')->with('success', 'Assignment updated');
    }

    public function destroy(ServerBackup $serverBackup)
    {
        $this->authorizeAction(['admin']);
        $serverBackup->delete();
        return redirect()->route('server-backups.index')->with('success', 'Assignment deleted');
    }

    private function authorizeAction(array $roles)
    {
        if (!in_array(Auth::user()->role, $roles)) {
            abort(403);
        }
    }
}
