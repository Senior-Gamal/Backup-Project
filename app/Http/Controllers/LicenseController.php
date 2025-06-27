<?php

namespace App\Http\Controllers;

use App\Models\License;
use App\Models\ClientServer;
use App\Models\ActivityLog;
use Illuminate\Http\Request;

class LicenseController extends Controller
{
    public function index()
    {
        $licenses = License::with('clientServer')->get();
        return view('licenses.index', compact('licenses'));
    }

    public function create()
    {
        $clients = ClientServer::pluck('hostname', 'id');
        return view('licenses.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'key' => 'required|string|max:255',
            'expiry_date' => 'nullable|date',
            'client_server_id' => 'required|exists:client_servers,id',
        ]);
        $license = License::create($data);
        ActivityLog::create([
            'user_id' => $request->user()->id,
            'action' => "Created license {$license->key}",
        ]);
        return redirect()->route('licenses.index');
    }

    public function edit(License $license)
    {
        $clients = ClientServer::pluck('hostname', 'id');
        return view('licenses.edit', compact('license', 'clients'));
    }

    public function update(Request $request, License $license)
    {
        $data = $request->validate([
            'key' => 'required|string|max:255',
            'expiry_date' => 'nullable|date',
            'client_server_id' => 'required|exists:client_servers,id',
        ]);
        $license->update($data);
        ActivityLog::create([
            'user_id' => $request->user()->id,
            'action' => "Updated license {$license->key}",
        ]);
        return redirect()->route('licenses.index');
    }

    public function destroy(License $license)
    {
        $key = $license->key;
        $license->delete();
        ActivityLog::create([
            'user_id' => auth()->id(),
            'action' => "Deleted license {$key}",
        ]);
        return redirect()->route('licenses.index');
    }
}
