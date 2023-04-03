<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Excercise extends Model
{
    use HasFactory;

    public function userexcercise(){
        return $this->hasOne(UserExcercise::class, 'id', 'excercise_id');
    }
}
