<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserExcercise;
use App\Models\UserNutritions;
use App\Models\UserProfile;
use App\Models\Excercise;
use App\Models\NutritionTrack;
use Carbon\Carbon;

use App\Models\Nutrition;

class PlanController extends Controller
{
    //
    public function add_user_excercise(Request $request)
    {
        $find_user_profile = UserProfile::where('user_id',$request->user_id)->first();
        // $find_user_profile = UserProfile::where('user_id',auth()->user()->id)->first();

        if($find_user_profile){

            $excercise = Excercise::where('goal',$find_user_profile->goal)->get();
            $nutrition = Nutrition::where('goal',$find_user_profile->goal)->get();
            // dd($nutrition);

            if(isset($nutrition)){
                foreach($nutrition as $nut){
                    $find_excercise_exist = UserNutritions::where('user_id',$request->user_id)->where('nutrition_id',$nut->id)->first();
                    // $find_excercise_exist = UserNutritions::where('user_id',auth()->user()->id)->where('nutrition_id',$nut->id)->first();
                    if($find_excercise_exist){
                        $find_excercise_exist->goal = $nut->goal;
                        $find_excercise_exist->recipee_type = $nut->recipe_type;
                        $find_excercise_exist->year = $nut->year;
                        $find_excercise_exist->month = $nut->month;
                        $find_excercise_exist->serving = $nut->serving;
                        $find_excercise_exist->user_id = $request->user_id;
                        // $find_excercise_exist->user_id = auth()->user()->id;
                        $find_excercise_exist->save();
                    }else{
                        $user_nutrition = new UserNutritions();
                        $user_nutrition->nutrition_id = $nut->id;
                        $user_nutrition->goal = $nut->goal;
                        $user_nutrition->recipee_type = $nut->recipe_type;
                        $user_nutrition->year = $nut->year;
                        $user_nutrition->month = $nut->month;
                        $user_nutrition->serving = $nut->serving;
                        $user_nutrition->user_id = $request->user_id;
                        // $user_nutrition->user_id = auth()->user()->id;
                        $user_nutrition->save();
                    }

                }
            }else{
                return response()->json(['message' => 'User Nutrition Not Found'],404);
            }
            if(isset($excercise)){
                foreach($excercise as $ex){
                    $find_excercise_exist = UserExcercise::where('user_id',$request->user_id)->where('excercise_id',$ex->id)->first();
                    // $find_excercise_exist = UserExcercise::where('user_id',auth()->user()->id)->where('excercise_id',$ex->id)->first();
                    if($find_excercise_exist){
                        $find_excercise_exist->week = $ex->week;
                        $find_excercise_exist->day = $ex->day;
                        $find_excercise_exist->month = $ex->month;
                        $find_excercise_exist->year = $ex->year;
                        $find_excercise_exist->user_id = $request->user_id;
                        // $find_excercise_exist->user_id = auth()->user()->id;
                        $find_excercise_exist->save();
                    }else{
                        $user_excercise = new UserExcercise();
                        $user_excercise->excercise_id = $ex->id;
                        $user_excercise->week = $ex->week;
                        $user_excercise->day = $ex->day;
                        $user_excercise->month = $ex->month;
                        $user_excercise->year = $ex->year;
                        $user_excercise->user_id = $request->user_id;
                        // $user_excercise->user_id = auth()->user()->id;
                        $user_excercise->save();
                    }
            }
            return response()->json(['message' => 'Add User Excercise & Nutrtion Succefully'],200);
            }else{
                return response()->json(['message' => 'User Excercise Not Found'],404);
            }
        }else{
            return response()->json(['message' => 'Please Setup your Profile First']);
        }


    }

    public function find_excercise(Request $request)
    {
            $request->validate([
                'month' => 'required',
                'year' => 'required',
                'week' => 'required',
                'day' => 'required',
            ]);
        $find_excercise = UserExcercise::with('excercise')->where('user_id',$request->user_id)->where("month",$request->month)
        // $find_excercise = UserExcercise::with('excercise')->where('user_id',auth()->user()->id)->where("month",$request->month)

        ->where('year',$request->year)
        ->where('week',$request->week)
        ->where('day',$request->day)->get();
        if(count($find_excercise) > 0 ){
            return response()->json(['message' => 'Find Excercise Succefully','nutrition' => $find_excercise],200);
        }else{
            return response()->json(['message' => 'Excercise did not exist'],404);
        }
    }
    public function find_nutrition(Request $request)
    {

        $request->validate([
            'month' => 'required',
            'year' => 'required',
            'goal' => 'required',
            'recipee_type' => 'required',
        ]);
        $find_nutrition = UserNutritions::with('nutrition')
        ->where('user_id',$request->user_id)->where("month",$request->month)
        // ->where('user_id',auth()->user()->id)->where("month",$request->month)

        ->where("year",$request->year)->where('goal',$request->goal)
        ->where("recipee_type",$request->recipee_type)->get();
        if(count($find_nutrition) > 0 ){
            foreach($find_nutrition as $nutrition_carbs){
                $net_carbs_cal = $nutrition_carbs->nutrition->net_carbs * 4 ;
                $protien_cal = $nutrition_carbs->nutrition->protien * 4 ;
                $fat_cal = $nutrition_carbs->nutrition->fat * 9 ;
            }
            return response()->json(['message' => 'Find Nutrition Succefully',
            'nutrition' => $find_nutrition,
            'net_carbs_cal' => $net_carbs_cal,
            'protien_cal' => $protien_cal,
            'fat_cal' => $fat_cal

        ],200);
        }else{
            return response()->json(['message' => 'Nutrition did not exist'],404);
        }
    }
    public function update_excercise(Request $request)
    {
        $request->validate([
            'user_excercise_id' =>'required',
        ]);
        $find_excercise = UserExcercise::where('id',$request->user_excercise_id)->where('user_id',$request->user_id)->first();
        // $find_excercise = UserExcercise::where('id',$request->user_excercise_id)->where('user_id',auth()->user()->id)->first();
        if($find_excercise){
            if($find_excercise->status == 0){
            $find_excercise->status = 1;
            if($find_excercise->save()){
                return response()->json(['message' => 'Succefully Update Status','status' => $find_excercise->status],200);
            }else{
                return response()->json(['message' => 'Something Went Wrong'],402);
            }
          }else{
              return response()->json(['message' => 'User Excercise Already Completed'],404);
          }
        }
        else{
            return response()->json(['message' => 'User Excercise Not Found'],404);
        }
    }
    public function update_nutrition(Request $request)
    {
        $request->validate([
            'user_nutrition_id' => 'required',
            'serving'   => 'required',
        ]);
        $today_date = Carbon::today()->format('Y-m-d');
        $find_nutrition = Usernutritions::with('nutrition')->where('id',$request->user_nutrition_id)->where('user_id',$request->user_id)->first();
        // $find_nutrition = Usernutritions::with('nutrition')->where('id',$request->user_nutrition_id)->where('user_id',auth()->user()->id)->first();
        // $NutritionTrack = NutritionTrack::where('user_id',auth()->user()->id)->where('user_nutrition_id',$request->user_nutrition_id)->get();
        if($find_nutrition ){
            // $find_nutrition->status = 1;
            $serving = (int) substr($request->serving,0,1);
            if($find_nutrition->save()){
                $nutrition_track = new NutritionTrack();
                $nutrition_track->user_id = $request->user_id;
                // $nutrition_track->user_id = auth()->user()->id;
                $nutrition_track->user_nutrition_id = $request->user_nutrition_id;
                $nutrition_track->serving_no = $serving;
                $nutrition_track->net_carbs = $find_nutrition->nutrition->net_carbs * $serving;
                $nutrition_track->protien = $find_nutrition->nutrition->protien * $serving;
                $nutrition_track->fat = $find_nutrition->nutrition->fat * $serving;
                $nutrition_track->date = $today_date;
                $nutrition_track->save();
                return response()->json(['message' => 'Succefully Update Status'],200);
            }else{
                return response()->json(['message' => 'Something Went Wrong'],404);
            }
        }
        else{
            return response()->json(['message' => 'Nutrition Serves Already '],404);
        }
    }
    public function get_burncalories(Request $request)
    {
        $request->validate([
            'date' => 'required|date|date_format:Y-m-d',
        ]);
        $find_nutrition_track = NutritionTrack::where('date', $request->date)->where('user_id',$request->user_id)->get();
        // $find_nutrition_track = NutritionTrack::where('date', $request->date)->where('user_id',auth()->user()->id)->get();

        if($find_nutrition_track){
            $total_burn = 0;
            $total_net_carbs = 0;
            $total_protien = 0;
            $total_fat = 0;
            foreach($find_nutrition_track as $nutrition_track){
            $calories_burn = (4 * $nutrition_track->protien) + (9 * $nutrition_track->fat) + (4 * $nutrition_track->net_carbs);
            $total_burn += $calories_burn;
            $total_net_carbs += $nutrition_track->net_carbs;
            $total_protien += $nutrition_track->protien;
            $total_fat += $nutrition_track->fat;
            }
            $total_net_carbs_calories = $total_net_carbs * 4;
            $total_protien_calories = $total_protien * 4;
            $total_fat_calories = $total_fat * 9;
            return response()->json(['burn_calories' => $total_burn,'net_carbs' =>
            $total_net_carbs,
            'total_protien' => $total_protien ,'total_fat' => $total_fat,
            'total_net_carbs_calories' => $total_net_carbs_calories,
            'total_protien_calories' => $total_protien_calories,
            'total_fat_calories' => $total_fat_calories
        ],200);
        }else{
            return response()->json(['message' => 'Nutrition Track Not Found'],404);
        }
    }
}
