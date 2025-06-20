<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BackupServer extends Model
{
    use HasFactory;

    protected $fillable = [
        'hostname',
        'ip_address',
        'dns',
        'disk_space',
        'connection_speed',
        'timezone',
        'vnc_user',
        'control_panel',
        'license_group',
        'license',
        'internal_backup',
        'notes',
    ];
}
