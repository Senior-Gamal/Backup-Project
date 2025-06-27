<?php

namespace App\Http\Controllers;

use App\Models\BackupServer;
use App\Models\ClientServer;
use App\Models\BackupSchedule;
use App\Models\ActivityLog;
use App\Models\License;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'client_servers' => ClientServer::count(),
            'backup_servers' => BackupServer::count(),
            'licenses' => License::count(),
            'todays_schedules' => BackupSchedule::with('server')->whereDate('scheduled_at', today())->get(),
            'recent_logs' => ActivityLog::latest()->take(5)->get(),
        ];

        return view('dashboard', $data);
    }
}
