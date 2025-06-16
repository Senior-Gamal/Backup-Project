<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ServerBackup;
use App\Models\License;

class Server extends Model
{
    use HasFactory;

    protected $fillable = [
        'hostname',
        'ip',
        'dns',
        'vnc',
        'control_panel',
        'backup_time',
        'username',
        'password',
        'license_reference',
        'node_group',
        'data_center',
        'timezone',
        'notes',
    ];

    public function backups()
    {
        return $this->hasMany(ServerBackup::class);
    }

    public function licenses()
    {
        return $this->hasMany(License::class);
    }
}
