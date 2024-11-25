<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseChecklist extends Model
{
    use HasFactory;

     public function getName(){
    	return $this->hasOne(User::class,'id','staff');
    }
}
