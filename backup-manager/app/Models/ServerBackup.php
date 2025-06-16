<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
