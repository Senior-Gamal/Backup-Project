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
}
