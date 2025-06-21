<?php

namespace App\Http\Controllers;

use App\Models\BackupServer;
use App\Models\ClientServer;
use App\Models\License;
use App\Models\BackupSchedule;
use App\Models\ActivityLog;

class DashboardController extends Controller
{
    public function index()
    {
        $user = request()->user();

        $recentLogsQuery = ActivityLog::latest()->take(5);
        if (!$user->isAdmin()) {
            $recentLogsQuery->where('user_id', $user->id);
        }

        $data = [
            'client_servers' => ClientServer::count(),
            'backup_servers' => BackupServer::count(),
            'licenses' => License::count(),
            'today_schedules' => BackupSchedule::with('server')
                ->whereDate('scheduled_at', today())
                ->orderBy('scheduled_at')
                ->get(),
            'recent_logs' => $user->isViewer() ? collect() : $recentLogsQuery->get(),
        ];

        return view('dashboard', $data);
    }
}
