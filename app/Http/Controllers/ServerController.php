<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Server;

class ServerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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
        $data = $request->validate([
            'hostname' => 'required|string|max:255',
            'ip_address' => 'required|string|max:255',
            'timezone' => 'required|string|max:255',
        ]);

        Server::create($data);

        return redirect()->route('servers.index')
                         ->with('success', 'Server created successfully.');
    }
}
