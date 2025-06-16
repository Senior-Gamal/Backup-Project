<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\License;

class LicenseGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function licenses()
    {
        return $this->hasMany(License::class);
    }
}
