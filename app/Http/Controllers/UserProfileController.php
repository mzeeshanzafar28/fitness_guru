<?php

namespace App\Http\Controllers;
use App\Models\UserProfile;
use App\Models\WeightTracker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;

class UserProfileController extends Controller
{
    public function profile_gender(Request $request){
        $user_find = UserProfile::where('user_id',$request->user_id)->first();
        // $user_find = UserProfile::where('user_id',Auth::id())->first();
        if(!$user_find){
            $user_create = new UserProfile();
            $user_create->gender = $request->gender;
            $user_create->user_id = $request->user_id;
            if($user_create->save()){
                return response()->json(['message' => 'Succefully saved data']);
            }else{
                return response()->json(['message' => 'Something Error']);
            }
        }else{
            return response()->json(['message' => 'You have already setup your profile']);
        }

    }
    public function profile_pic(Request $request)
    {
        $find_user = UserProfile::where("user_id",$request->user_id)->first();
        // $find_user = UserProfile::where("user_id",Auth::id())->first();
        // dd($find_user->profile_pic == null);
        if($find_user && $find_user->profile_pic == null){
            if($request->hasFile('image')){
                $file = $request->file('image');
                $image_name= $file->getClientOriginalName();
                $image_replace = str_replace(' ','_',$image_name);

                $file->move(public_path('user_image'),$image_replace);

                $find_user->profile_pic = $image_replace;

                if($find_user->save()){
                    return response()->json(['message' => 'Succefully saved data']);
                }else{
                    return response()->json(['message' => 'You have already setup your profile Pic']);
                }

            }
        }else{
            return response()->json(['message' => 'You have already setup your profile Pic']);
        }
    }
    public function profile_goal(Request $request)
    {
        $find_user = UserProfile::where('user_id',$request->user_id)->first();
        // $find_user = UserProfile::where('user_id',Auth::id())->first();
        if($find_user && $find_user->goal == null){
            $find_user->goal = $request->goal;
            if($find_user->save()){
                return response()->json(['message' => 'Succefully save Goal']);
            }else{
                return response()->json(['messsge' => 'Not save Succefully']);
            }
        }else{
            return response()->json(['message' => 'You have already setup your Goal']);
        }
    }
    public function profile_activity(Request $request)
    {
        $find_user = UserProfile::where('user_id',$request->user_id)->first();
        // $find_user = UserProfile::where('user_id',Auth::id())->first();
        if($find_user && $find_user->activity == null){
            $activity = str_replace(' ','_',$request->activity);
            $find_user->activity = $activity;
            if($find_user->save()){
                return response()->json(['message' => 'Succefully save activity']);
            }else{
                return response()->json(['messsge' => 'Not save Succefully']);
            }
        }else{
            return response()->json(['message' => 'You have already setup your Activity']);
        }
    }
    public function profile_birth(Request $request)
    {
        $find_user = UserProfile::where('user_id',$request->user_id)->first();
        // $find_user = UserProfile::where('user_id',Auth::id())->first();
        if($find_user && $find_user->date_of_birth == null){
            $find_user->date_of_birth = $request->date_of_birth;
            if($find_user->save()){
                return response()->json(['message' => 'Succefully save Date of Birth']);
            }else{
                return response()->json(['messsge' => 'Not save Succefully']);
            }
        }else{
            return response()->json(['message' => 'You have already setup your Date of Birth']);
        }
    }
    public function profile_height(Request $request)
    {
        $find_user = UserProfile::where('user_id',$request->user_id)->first();
        // $find_user = UserProfile::where('user_id',Auth::id())->first();
        if($find_user && $find_user->height == null){
            $find_user->height = $request->height;
            if($find_user->save()){
                return response()->json(['message' => 'Succefully save Height']);
            }else{
                return response()->json(['messsge' => 'Not save Succefully']);
            }
        }else{
            return response()->json(['message' => 'You have already setup your height']);
        }
    }
    public function profile_weight(Request $request)
    {
        $find_user = UserProfile::where('user_id',$request->user_id)->first();
        // $find_user = UserProfile::where('user_id',Auth::id())->first();
        if($find_user && $find_user->weight == null){
            $find_user->weight = $request->weight;
            if($find_user->save()){
                $weight_tracker = new WeightTracker();
                $weight_tracker->user_id = Auth::id();
                $weight_tracker->weight = $request->weight;
                $weight_tracker->date = Carbon::now()->format('Y-m-d');
                $weight_tracker->save();
                return response()->json(['message' => 'Succefully save weight']);
            }else{
                return response()->json(['messsge' => 'Not save Succefully']);
            }
        }else{
            return response()->json(['message' => 'You have already setup your weight']);
        }
    }
    public function my_profile($user_id){
        $user_profile = UserProfile::where('user_id',$user_id)->first();
        return response()->json(['message',$user_profile]);
    }
    public function last_weight($user_id)
    {
        $user_weight = WeightTracker::where('user_id',$user_id)->orderBy('id','DESC')->first();
        // $user_weight = WeightTracker::where('user_id',Auth::id())->orderBy('id','DESC')->first();

        return response()->json(['weight' => $user_weight->weight]);
    }
    public function update_weight(Request $request)
    {
       $request->validate([
        'weight_record' => 'required'
       ]);
       $user_weight = new WeightTracker();
       $user_weight->user_id = $request->user_id;
    //    $user_weight->user_id = Auth::id();
       $user_weight->weight = $request->weight_record;
       $user_weight->date = Carbon::now()->format('Y-m-d');
       $user_weight->save();
       return response()->json(['message' => 'Succefully update weight']);
    }
    public function weight_chart($user_id)
    {
        $weight_chart = WeightTracker::where('user_id',$user_id)->orderBy('id','DESC')->get();
        // $weight_chart = WeightTracker::where('user_id',Auth::id())->orderBy('id','DESC')->get();

        if(count($weight_chart)>0){
            return response()->json(['weight_chart' => $weight_chart]);
        }else{
            return response()->json(['message' => 'Something Error']);
        }
    }
}
