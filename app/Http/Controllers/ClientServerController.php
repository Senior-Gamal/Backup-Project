<?php
namespace App\Http\Controllers;

class ClientServerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $clientServers = \App\Models\ClientServer::all();
        return view('client-servers.index', compact('clientServers'));
    }

    public function create()
    {
        return view('client-servers.create');
    }

    public function store(\Illuminate\Http\Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'ip_address' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'timezone' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'password' => 'required|string|max:255',
        ]);

        \App\Models\ClientServer::create($data);

        return redirect()->route('client-servers.index')
                         ->with('success', 'Client server created successfully.');
    }
}
