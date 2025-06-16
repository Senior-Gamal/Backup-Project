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
}
