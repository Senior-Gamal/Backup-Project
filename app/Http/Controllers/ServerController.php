<?php
namespace App\Http\Controllers;

class ServerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $servers = \App\Models\Server::all();
        return view('servers.index', compact('servers'));
    }
}
