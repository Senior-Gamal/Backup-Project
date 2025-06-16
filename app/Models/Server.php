<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    protected $fillable = [
        'hostname',
        'ip_address',
        'dns',
        'vnc_user',
        'vnc_password',
        'control_panel',
        'license_id',
        'license_group_id',
        'disk_space',
        'connection_speed',
        'timezone',
        'internal_backup_enabled',
        'internal_backup_time',
        'external_backup_compressed',
        'full_backup_time',
        'external_backup_server',
        'external_backup_username',
        'external_backup_password',
        'incremental_time',
        'incremental_backup_server',
        'db_backup_time',
        'db_backup_server',
        'nas_schedule',
        'nas_user',
        'nas_password',
        'backup_system_type',
        'backup_system_version',
        'backup_secret_code',
        'node_group',
        'datacenter',
        'client_number',
        'notes',
        'last_data_update_at'
    ];
}
