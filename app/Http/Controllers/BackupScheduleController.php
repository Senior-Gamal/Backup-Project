<?php

namespace App\Http\Controllers;

use App\Models\BackupSchedule;
use App\Models\BackupServer;
use App\Models\ActivityLog;
use Illuminate\Http\Request;

class BackupScheduleController extends Controller
{
    public function index()
    {
        $schedules = BackupSchedule::with('server')->orderBy('scheduled_at')->get();
        return view('schedules.index', compact('schedules'));
    }

    public function create()
    {
        $servers = BackupServer::pluck('hostname', 'id');
        return view('schedules.create', compact('servers'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'backup_server_id' => 'required|exists:backup_servers,id',
            'scheduled_at' => 'required|date',
            'type' => 'required|string|max:255',
        ]);

        $conflict = BackupSchedule::where('scheduled_at', $data['scheduled_at'])->exists();
        if ($conflict) {
            return back()->withErrors(['scheduled_at' => 'Time conflict with another backup.'])->withInput();
        }

        $schedule = BackupSchedule::create($data);
        ActivityLog::create([
            'user_id' => $request->user()->id,
            'action' => "Scheduled backup {$schedule->type} on {$schedule->scheduled_at}",
        ]);
        return redirect()->route('schedules.index');
    }

    public function destroy(BackupSchedule $schedule)
    {
        $info = $schedule->scheduled_at;
        $schedule->delete();
        ActivityLog::create([
            'user_id' => auth()->id(),
            'action' => "Deleted schedule {$info}",
        ]);
        return redirect()->route('schedules.index');
    }
}
