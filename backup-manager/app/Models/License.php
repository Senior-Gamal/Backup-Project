<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Server;
use App\Models\LicenseGroup;

class License extends Model
{
    use HasFactory;

    protected $fillable = [
        'server_id',
        'license_group_id',
        'license_key',
        'expires_at',
    ];

    public function server()
    {
        return $this->belongsTo(Server::class);
    }

    public function licenseGroup()
    {
        return $this->belongsTo(LicenseGroup::class);
    }
}
