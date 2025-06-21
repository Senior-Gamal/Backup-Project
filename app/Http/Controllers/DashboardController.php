<?php

namespace App\Http\Controllers;

use App\Models\BackupServer;

class DashboardController extends Controller
{
    public function index()
    {
        $totalClientServers = 0;
        $totalBackupServers = BackupServer::count();
        $totalActiveLicenses = 0;
        $upcomingBackups = 0;
        $servers = BackupServer::select('hostname', 'timezone')->get();

        return view('dashboard.index', compact(
            'totalClientServers',
            'totalBackupServers',
            'totalActiveLicenses',
            'upcomingBackups',
            'servers'
        ));
    }
}
