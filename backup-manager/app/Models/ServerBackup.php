<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Server;
use App\Models\BackupServer;

class ServerBackup extends Model
{
    use HasFactory;

    protected $fillable = [
        'server_id',
        'backup_server_id',
        'backup_type',
        'schedule_hour',
        'day_of_week',
    ];

    public function server()
    {
        return $this->belongsTo(Server::class);
    }

    public function backupServer()
    {
        return $this->belongsTo(BackupServer::class);
    }
}
