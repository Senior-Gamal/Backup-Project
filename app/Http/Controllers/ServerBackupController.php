<?php
namespace App\Http\Controllers;

class ServerBackupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $serverBackups = \App\Models\ServerBackup::with(['server', 'backupServer'])->get();
        return view('server-backups.index', compact('serverBackups'));
    }

    public function create()
    {
        $servers = \App\Models\Server::all();
        $backupServers = \App\Models\ClientServer::all();
        return view('server-backups.create', compact('servers', 'backupServers'));
    }

    public function store(\Illuminate\Http\Request $request)
    {
        $data = $request->validate([
            'server_id' => 'required|integer',
            'backup_type' => 'required|string|max:255',
            'backup_server_id' => 'required|integer',
            'username' => 'required|string|max:255',
            'password' => 'required|string|max:255',
            'schedule_day' => 'nullable|integer',
            'schedule_hour' => 'nullable|integer',
            'timezone' => 'required|string|max:255',
        ]);

        \App\Models\ServerBackup::create($data);

        return redirect()->route('server-backups.index')
                         ->with('success', 'Server backup created successfully.');
    }
}
