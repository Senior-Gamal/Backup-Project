<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ServerBackup;

class BackupServer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'ip',
        'path',
        'type',
    ];

    public function backups()
    {
        return $this->hasMany(ServerBackup::class);
    }
}
