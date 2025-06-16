<?php
namespace App\Http\Controllers;

use App\Models\Server;
use App\Models\BackupServer;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $serversCount = Server::count();
        $backupServersCount = BackupServer::count();
        $usersCount = User::count();

        return view('dashboard', [
            'serversCount' => $serversCount,
            'backupServersCount' => $backupServersCount,
            'usersCount' => $usersCount,
        ]);
    }
}
