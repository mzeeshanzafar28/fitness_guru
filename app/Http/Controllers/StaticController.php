<?php

namespace App\Http\Controllers;
use App\Models\UserExcercise;
use App\Models\WaterTrack;
use App\Models\UserProfile;
use App\Models\WeightTracker;
use Illuminate\Http\Request;
use Carbon\Carbon;

class StaticController extends Controller
{
    //
    public function static(Request $request)
    {
        $request->validate([
            'month' => 'required',
            'week' => 'required',
        ]);

        $status_days = [];

        for($i=1;$i<6;$i++){
            $total_excercise = UserExcercise::where('month', $request->month)
            ->where('week', $request->week)
            ->where('day',$i)
            ->where('user_id',$request->user_id)
            // ->where('user_id',auth()->user()->id)
            ->count();
            $completed_excercise = UserExcercise::where('month', $request->month)->where('week', $request->week)
            ->where('day', $i)
            ->where('status', 1)
            ->where('user_id',$request->user_id)
            // ->where('user_id',auth()->user()->id)
            ->count();


            if($total_excercise > 0){
                $percentage = ($completed_excercise / $total_excercise) * 100;
                $status_days['day '.$i] = $percentage;
            }else{
                $status_days['day '.$i] = 0;
            }
        }
        if(count($status_days) > 0){
            return response()->json(['statics' => $status_days],200);
        }else{
            return response()->json(['statics' => []],404);
        }
    }
    public function water_tracker()
    {
        $today_date = Carbon::today()->format('Y-m-d');
        $find_water_track_by_user = WaterTrack::where('date', $today_date)->where('user_id',$request->user_id)->first();
        // $find_water_track_by_user = WaterTrack::where('date', $today_date)->where('user_id',auth()->user()->id)->first();

        if($find_water_track_by_user){
            if($find_water_track_by_user->drink_water < 8){
            $find_water_track_by_user->drink_water = $find_water_track_by_user->drink_water + 1;
            if($find_water_track_by_user->save()){
                return response()->json(['water_tracker' => "You have Drinking " . $find_water_track_by_user->drink_water ." Glass today" ],200);
            }else{
                return response()->json(['water_tracker' => "Something Error" ],404);
            }
        }else{
            return response()->json(['water_tracker' => 'You can not  Drink more then 8 Glass in 1 day' ],200);
        }
        }else{
            $water_tracker = new WaterTrack();
            $water_tracker->date = $today_date;
            $water_tracker->user_id = $request->user_id;
            // $water_tracker->user_id = auth()->user()->id;
            $water_tracker->drink_water = 1;
            if($water_tracker->save()){
                return response()->json(['water_tracker' => "You have Drinking " . 1 ." Glass today" ],200);
            }else{
                return response()->json(['water_tracker' => "Something Error" ],404);
            }
        }
    }
    public function get_water_tracker($user_id)
    {
        $get_water_today = WaterTrack::where('user_id',$user_id)->get();
        // $get_water_today = WaterTrack::where('user_id',auth()->user()->id)->get();

        if($get_water_today){
            return response()->json(['water_tracker' => $get_water_today],200);
        }else{
            return response()->json(['water_tracker' => "You have not Drink Water History" ],404);
        }
    }
    public function decrease_water_tracker()
    {
        $today_date = Carbon::today()->format('Y-m-d');
        $find_water_track_by_user = WaterTrack::where('date', $today_date)->where('user_id',$request->user_id)->first();
        // $find_water_track_by_user = WaterTrack::where('date', $today_date)->where('user_id',auth()->user()->id)->first();

        if($find_water_track_by_user && $find_water_track_by_user->drink_water > 0){
            $find_water_track_by_user->drink_water = $find_water_track_by_user->drink_water - 1;
            if($find_water_track_by_user->save()){
                return response()->json(['water_tracker' => "You have Drinking " . $find_water_track_by_user->drink_water ." Glass today" ],200);
            }else{
                return response()->json(['water_tracker' => "Something Error" ],404);
            }
        }else{
                return response()->json(['water_tracker' => "You have not Drink water yet" ],404);
        }
    }
    public function get_lastwater_track($user_id)
    {
        $today_date = Carbon::now()->format('Y-m-d');
        $get_water_today = WaterTrack::where('date',$today_date)->where('user_id',$user_id)->first();
        // $get_water_today = WaterTrack::where('date',$today_date)->where('user_id',auth()->user()->id)->first();

        if($get_water_today){
            return response()->json(['water_tracker' => $get_water_today],200);
        }else{
            return response()->json(['water_tracker' => "You have not Drink Water History" ],404);
        }
    }
    public function calories($user_id)
    {
        $user_profile = UserProfile::where('user_id',$user_id)->first();
        // $user_profile = UserProfile::where('user_id',auth()->user()->id)->first();

        $user_weight = WeightTracker::where('user_id',$user_id)->orderBy('id','DESC')->first();
        // $user_weight = WeightTracker::where('user_id',auth()->user()->id)->orderBy('id','DESC')->first();

        $current_year = Carbon::now()->format('Y');
        $age_in_years = (int) $current_year - (int) Carbon::createFromFormat('Y-m-d',$user_profile->date_of_birth)->format('Y');
        $weight_in_kg = (float) $user_weight->weight;
        $feet_in_array = explode(" ' ",$user_profile->height);
        $feet = (int) $feet_in_array[0];
        $inches = (int) $feet_in_array[1];
        $feet_in_inches = ( 12 * $feet ) + $inches;
        $height_in_cm = $feet_in_inches * 2.54 ;
        if($user_profile->gender == 'Male'){
           $calories =  (10 * $weight_in_kg) + (6.25 * $height_in_cm) - (5 * $age_in_years) + 5 ;
        }else{
            $calories =  (10 * $weight_in_kg) + (6.25 * $height_in_cm) - (5 * $age_in_years) - 161 ;
        }

        return response()->json(['calories' => $calories],200);

    }
}
