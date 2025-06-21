<?php

namespace App\Http\Controllers;

use App\Models\{BackupServer, ClientServer, License, ActivityLog};

class DashboardController extends Controller
{
    public function index()
    {
        $totalClientServers = ClientServer::count();
        $totalBackupServers = BackupServer::count();
        $totalActiveLicenses = License::where('active', true)->count();
        $upcomingBackups = 0;

        $servers = BackupServer::select('hostname', 'timezone')->get();
        $activities = ActivityLog::latest()->take(5)->get();

        return view('dashboard.index', compact(
            'totalClientServers',
            'totalBackupServers',
            'totalActiveLicenses',
            'upcomingBackups',
            'servers',
            'activities'
        ));
    }
}
