<?php

namespace App\Http\Controllers;

use App\Models\BackupServer;
use App\Models\ClientServer;
use App\Models\BackupSchedule;
use App\Models\ActivityLog;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'client_servers' => ClientServer::count(),
            'backup_servers' => BackupServer::count(),
            'upcoming_backups' => BackupSchedule::whereDate('scheduled_at', today())->count(),
            'recent_logs' => ActivityLog::latest()->take(5)->get(),
        ];

        return view('dashboard', $data);
    }
}
