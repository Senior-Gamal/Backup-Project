<?php

namespace App\Http\Controllers;

use App\Models\BackupServer;
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
        $data = $request->validate([
            'hostname' => 'required|string|max:255',
            'ip_address' => 'required|string|max:255',
            'timezone' => 'required|string|max:255',
            'notes' => 'nullable|string',
        ]);

        BackupServer::create($data);

        return redirect()->route('backupservers.index');
    }
}
