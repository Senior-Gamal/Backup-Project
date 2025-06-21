<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BackupSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'backup_server_id',
        'scheduled_at',
        'type',
    ];

    protected $casts = [
        'scheduled_at' => 'datetime',
    ];

    public function server()
    {
        return $this->belongsTo(BackupServer::class, 'backup_server_id');
    }
}
