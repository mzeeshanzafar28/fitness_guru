<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserExcercise extends Model
{
    use HasFactory;

    public function excercise(){
        return $this->belongsTo(Excercise::class,'excercise_id','id');
    }
}
