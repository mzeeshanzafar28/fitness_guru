<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserNutritions extends Model
{
    use HasFactory;

    public function nutrition(){
        return $this->belongsTo(Nutrition::class,'nutrition_id','id');
    }
}
