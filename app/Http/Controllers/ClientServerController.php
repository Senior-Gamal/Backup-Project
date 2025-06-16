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
        return view('client-servers.index');
    }
}
