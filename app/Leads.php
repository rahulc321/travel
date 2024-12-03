<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leads extends Model
{
    use HasFactory;

    public function agentName()
    {
        return $this->hasOne(User::class,'id','user_id');

    }
}
