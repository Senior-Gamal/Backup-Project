<?php

namespace App\Http\Controllers;

use App\Models\ClientServer;
use App\Models\ActivityLog;
use Illuminate\Http\Request;

class ClientServerController extends Controller
{
    public function index()
    {
        $servers = ClientServer::all();
        return view('clientservers.index', compact('servers'));
    }

    public function create()
    {
        return view('clientservers.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'hostname' => 'required|string|max:255',
            'ip_address' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
        ]);
        $server = ClientServer::create($data);
        ActivityLog::create([
            'user_id' => $request->user()->id,
            'action' => "Created client server {$server->hostname}",
        ]);
        return redirect()->route('clientservers.index');
    }

    public function edit(ClientServer $clientserver)
    {
        return view('clientservers.edit', compact('clientserver'));
    }

    public function update(Request $request, ClientServer $clientserver)
    {
        $data = $request->validate([
            'hostname' => 'required|string|max:255',
            'ip_address' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
        ]);
        $clientserver->update($data);
        ActivityLog::create([
            'user_id' => $request->user()->id,
            'action' => "Updated client server {$clientserver->hostname}",
        ]);
        return redirect()->route('clientservers.index');
    }

    public function destroy(ClientServer $clientserver)
    {
        $name = $clientserver->hostname;
        $clientserver->delete();
        ActivityLog::create([
            'user_id' => auth()->id(),
            'action' => "Deleted client server {$name}",
        ]);
        return redirect()->route('clientservers.index');
    }
}
