<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckList extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getName(){
    	return $this->hasOne(User::class,'id','staff');
    }
}
