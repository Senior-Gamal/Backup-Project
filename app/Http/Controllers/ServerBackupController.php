<?php
namespace App\Http\Controllers;

class ServerBackupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('server-backups.index');
    }
}
