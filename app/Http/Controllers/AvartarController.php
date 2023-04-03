<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Auth;

class AvartarController extends Controller
{
    public function avatar_male()
    {
        $man = ['man1.png','man2.png','man3.png'];
        return response()->json(['man' => $man]);
    }
    public function avatar_female()
    {
        $female = ['female1.png','female2.png','female3.png'];
        return response()->json(['female' => $female]);
    }
    public function update_avatar(Request $request)
    {
        $request->validate([
            'avatar' =>'required'
        ]);
        $user_find = UserProfile::where('user_id',$request->user_id)->first();
        // $user_find = UserProfile::where('user_id',Auth::user()->id)->first();
        $user_find->profile_pic = $request->avatar;
        if($user_find->save()) {
            return response()->json(['message' => 'successfully updated profile']);
        }else{
            return response()->json(['message' => 'failed to update profile']);
        }
    }

}
