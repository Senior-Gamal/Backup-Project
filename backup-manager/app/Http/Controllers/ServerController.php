<?php
namespace App\Http\Controllers;

use App\Models\Server;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServerController extends Controller
{
    public function index()
    {
        $servers = Server::all();
        return view('servers.index', compact('servers'));
    }

    public function create()
    {
        $this->authorizeAction(['admin', 'manager']);
        return view('servers.create');
    }

    public function store(Request $request)
    {
        $this->authorizeAction(['admin', 'manager']);

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
        $this->authorizeAction(['admin', 'manager']);
        return view('servers.edit', compact('server'));
    }

    public function update(Request $request, Server $server)
    {
        $this->authorizeAction(['admin', 'manager']);

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
        $this->authorizeAction(['admin']);
        $server->delete();
        return redirect()->route('servers.index')->with('success', 'Server deleted');
    }

    private function authorizeAction(array $roles)
    {
        if (!in_array(Auth::user()->role, $roles)) {
            abort(403);
        }
    }
}
