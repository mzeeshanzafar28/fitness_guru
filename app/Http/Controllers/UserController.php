<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserProfile;
use App\Models\UserNutritions;
use App\Models\UserExcercise;
use App\Models\User;

class UserController extends Controller
{
    public function allUsers(){
        $users = User::where('user_type', 0)->orderBy('id', 'DESC')->get();
        return view('Users.AllUsers', get_defined_vars());
    }
    public function profile_info($id){
        $user = User::with('user_profile')->find($id);
        $nutrition_plan = UserNutritions::with('nutrition')->where('user_id', $id)->orderBy('id', 'DESC')->get();
        $excercise_plan = UserExcercise::with('excercise')->where('user_id', $id)->orderBy('id', 'DESC')->get();
        return view('Users.UserProfile', get_defined_vars());
    }
}
