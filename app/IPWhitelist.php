<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IPWhitelist extends Model
{
    use HasFactory;

    protected $table = 'ip_whitelist';
}
