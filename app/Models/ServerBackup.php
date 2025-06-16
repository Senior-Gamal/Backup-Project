<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServerBackup extends Model
{
    protected $fillable = [
        'server_id',
        'backup_type',
        'backup_server_id',
        'username',
        'password',
        'schedule_day',
        'schedule_hour',
        'timezone'
    ];

    public function server()
    {
        return $this->belongsTo(Server::class);
    }

    public function backupServer()
    {
        return $this->belongsTo(ClientServer::class, 'backup_server_id');
    }
}
