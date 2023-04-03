<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nutrition extends Model
{
    use HasFactory;

    public function usernutrition(){
        return $this->hasOne(UserNutritions::class,'id','nutrition_id');
    }
}
