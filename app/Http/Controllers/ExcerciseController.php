<?php

namespace App\Http\Controllers;
use App\Models\Excercise;
use Illuminate\Http\Request;


class ExcerciseController extends Controller
{
    //
    public function excercise_index()
    {
        return view('Excercise.Excercise',get_defined_vars());
    }
    public function add_excercise()
    {
        return view('Excercise.Add-excercise');
    }
    public function save_excercise(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'month' => 'required',
            'year' => 'required',
            'excercise_name' => 'required',
            'goal' => 'required',
            'week' => 'required',
        ]);

        if($request->id){
            $request->validate([
                'options_outlined' => 'required|in:minutes,repeats',
                'total_repeat' => 'required_if:options_outlined,repeats',
                'time' => 'required_if:options_outlined,minutes | max:59',
            ]);
            $excercise = Excercise::find($request->id);
            if($request->hasFile('image')){
                $file = $request->file('image');
                $image_name = $file->getClientOriginalName();
                $image_replace = time() . str_replace(' ','_',$image_name);
                $file->move(public_path('user_image'),$image_replace);
                $excercise->image = $image_replace;
            }
            if($request->hasFile('video')){
                $file_video = $request->file('video');
                $video_video= $file_video->getClientOriginalName();
                $video_replace = time() . str_replace(' ','_',$video_video);
                $file_video->move(public_path('user_image'),$video_replace);
               
                $excercise->video = $video_replace;
            }
            // foreach($request->activity as $activity){
            //    if($activity == "Sedentry"){
            //     $excercise->Sedentry = 1;
            //    }
            //    if($activity == "Extra_Active"){
            //     $excercise->Extra_Active = 1;
            //    }
            //    if($activity == "Very_Active"){
            //     $excercise->Very_Active = 1;
            //    }
            //    if($activity == "Moderately_Active"){
            //     $excercise->Moderately_Active = 1;
            //    }
            //    if($activity == "Lightly_Active"){
            //     $excercise->Lightly_Active = 1;
            //    }
            // }
            $excercise_types_repeat_value = null;
            $excercise_types_time_value = null;
            if($request->options_outlined == 'minutes'){
                $excercise_types_time_value = $request->time;    
            }
            if($request->options_outlined == 'repeats'){
                $excercise_types_repeat_value = $request->total_repeat;
            }
            $excercise->repeats = $excercise_types_repeat_value;
            $excercise->time = $excercise_types_time_value;
            $excercise->month = $request->month;
            $excercise->year = $request->year;
            $excercise->week = $request->week;
            $excercise->day = $request->day;
            $excercise->name = $request->excercise_name;
            $excercise->type_of_excercise = $request->options_outlined;
            $excercise->goal = $request->goal;
           $save_excercise = $excercise->save();
        }else{
            $request->validate([
                'image' => 'required|image',
                'video' => 'required|mimes:mp4,mov,ogg,webm',
            ]);
            //start validate week and days and their checkboxed
            foreach ($request->week as  $index => $value ) {
                $week_name = 'week_day'.$value;
                $request->validate([
                    $week_name => "required",
                ]);

                $week_day = $request->input('week_day'.$value);
                foreach($week_day as $week_day_index => $week_day_value){
                       $request->validate([
                        'options_outlined_week'. $value . '_' . $week_day_value => "required",
                       ]);
                    }
                }
            //end validate week and days and their checkboxed
            if($request->hasFile('image')){
                $file = $request->file('image');
                $image_name = $file->getClientOriginalName();
                $image_replace = time() . str_replace(' ','_',$image_name);
                $file->move(public_path('user_image'),$image_replace);
            }
            if($request->hasFile('video')){
                $file_video = $request->file('video');
                $video_video= $file_video->getClientOriginalName();
                $video_replace = time() . str_replace(' ','_',$video_video);
                $file_video->move(public_path('user_image'),$video_replace);
               
            }
            foreach ($request->week as  $index => $value ) {
                $week_day = $request->input('week_day'.$value);
                foreach($week_day as $week_day_index => $week_day_value){
                    $excercise  = new Excercise();
                    // foreach($request->activity as $activity){
                    //    if($activity == "Sedentry"){
                    //     $excercise->Sedentry = 1;
                    //    }
                    //    if($activity == "Extra_Active"){
                    //     $excercise->Extra_Active = 1;
                    //    }
                    //    if($activity == "Very_Active"){
                    //     $excercise->Very_Active = 1;
                    //    }
                    //    if($activity == "Moderately_Active"){
                    //     $excercise->Moderately_Active = 1;
                    //    }
                    //    if($activity == "Lightly_Active"){
                    //     $excercise->Lightly_Active = 1;
                    //    }
                    // }

                    $repeat = $request->input('total_repeat_week'.$value.'_day_'.$week_day_value);
                    $time = $request->input('time_week'.$value.'_day_'.$week_day_value);
                    $type_of_excercise = $request->input('options_outlined_week'. $value . '_' . $week_day_value);
                    if(str_contains($type_of_excercise, 'minutes')){
                        $excercise->type_of_excercise = 'minutes';

                    }
                    if(str_contains($type_of_excercise, 'repeats')){
                        $excercise->type_of_excercise = 'repeats';
                    }
                    $excercise->image = $image_replace;
                    $excercise->video = $video_replace;
                    $excercise->repeats = $repeat;
                    $excercise->time = $time;
                    $excercise->month = $request->month;
                    $excercise->year = $request->year;
                    $excercise->week = $value;
                    $excercise->day = $week_day_value;
                    $excercise->name = $request->excercise_name;
                    $excercise->goal = $request->goal;
                    $save_excercise = $excercise->save();
                }
            }
        }
        if($save_excercise){
            session()->flash('message','Succefully Add excercise');
            return redirect('excercise');
        }else{
            session()->flash('message','Not Add excercise');
            return redirect()->back();
        }
    }
    public function search(Request $request)
    {
        $month = $request->month;
        $year = $request->year;
        $week = $request->week;
        $day = $request->day;
        $search_result = Excercise::where("month",$request->month)->where('year',$request->year)->where('week',$request->week)->where('day',$request->day)->get();
        return view('Excercise.result',get_defined_vars());
    }
    public function edit($id)
    {
        $excercise = Excercise::where('id',$id)->first();
        return view('Excercise.Add-excercise',get_defined_vars());
    }
    public function delete($id)
    {
        $excercise = Excercise::where('id',$id)->delete();
        session()->flash('message','Delete Excercise Succefully');
        return redirect('excercise');
    }



}
