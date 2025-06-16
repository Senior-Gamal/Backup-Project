<?php
namespace App\Http\Controllers;

use App\Models\Server;
use Illuminate\Http\Request;

class ServerController extends Controller
{
    public function index()
    {
        $servers = Server::all();
        return view('servers.index', compact('servers'));
    }

    public function create()
    {
        
        return view('servers.create');
    }

    public function store(Request $request)
    {


        $validated = $request->validate([
            'hostname' => 'required',
            'ip' => 'required|ip',
            'timezone' => 'required',
        ]);

        Server::create($validated);

        return redirect()->route('servers.index')->with('success', 'Server created');
    }

    public function edit(Server $server)
    {

        return view('servers.edit', compact('server'));
    }

    public function update(Request $request, Server $server)
    {


        $validated = $request->validate([
            'hostname' => 'required',
            'ip' => 'required|ip',
            'timezone' => 'required',
        ]);

        $server->update($validated);

        return redirect()->route('servers.index')->with('success', 'Server updated');
    }

    public function destroy(Server $server)
    {

        $server->delete();
        return redirect()->route('servers.index')->with('success', 'Server deleted');
    }

}
