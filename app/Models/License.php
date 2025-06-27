<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'expiry_date',
        'client_server_id',
    ];

    protected $casts = [
        'expiry_date' => 'date',
    ];

    public function clientServer()
    {
        return $this->belongsTo(ClientServer::class);
    }
}
