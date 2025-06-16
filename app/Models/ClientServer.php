<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientServer extends Model
{
    protected $table = 'clients_servers';

    protected $fillable = [
        'name',
        'ip_address',
        'type',
        'timezone',
        'username',
        'password'
    ];
}
