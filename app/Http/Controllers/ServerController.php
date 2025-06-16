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
        return view('servers.index');
    }
}
