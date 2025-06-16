<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $serverCount = \App\Models\Server::count();
        $clientServerCount = \App\Models\ClientServer::count();
        $userCount = \App\Models\User::count();

        return view('home', [
            'serverCount' => $serverCount,
            'clientServerCount' => $clientServerCount,
            'userCount' => $userCount,
        ]);
    }
}
