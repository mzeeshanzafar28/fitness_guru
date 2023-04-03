<?php

namespace App\Http\Controllers;
use App\Models\Nutrition;

use Illuminate\Http\Request;

class NutritionController extends Controller
{
    //
    public function index()
    {
        
        $nutrition = Nutrition::all();
        return view('Nutrition.search-nutrition',get_defined_vars());
    }
    public function add()
    {
        return view('Nutrition.add-nutritions');
    }
    public function store(Request $request)
    {
        $request->validate([
            'month' => 'required',
            'year' => 'required',
            'goal' => 'required',
            'recipe_type' => 'required',
            'recipe_no' => 'required',
            'recipee_title' => 'required',
            'serving' => 'required',
            'net_carbs' => 'required',
            'protien' => 'required',
            'fat' => 'required',
            'about_recipee' => 'required',
            'ingredients' => 'required',
           
        ]);
        // dd($request->all());
           if($request->id){
            $nutrition = Nutrition::find($request->id);
        }else{
            $request->validate([
                'image' => 'required|image',
            ]);
            $nutrition  = new Nutrition();
        }
        if($request->hasFile('image')){
            $file = $request->file('image');
            $image_name = $file->getClientOriginalName();
            $image_replace = time() . str_replace(' ','_',$image_name);
            $file->move(public_path('user_image'),$image_replace);
            $nutrition->image = $image_replace;
        }
        //  foreach($request->activity as $activity){
        //    if($activity == "Sedentry"){
        //     $nutrition->Sedentry = 1;
        //    }
        //    if($activity == "Extra_Active"){
        //     $nutrition->Extra_Active = 1;
        //    }
        //    if($activity == "Very_Active"){
        //     $nutrition->Very_Active = 1;
        //    }
        //    if($activity == "Moderately_Active"){
        //     $nutrition->Moderately_Active = 1;
        //    }
        //    if($activity == "Lightly_Active"){
        //     $nutrition->Lightly_Active = 1;
        //    }
        // }
        $nutrition->month = $request->month;
        $nutrition->year = $request->year;
        $nutrition->goal = $request->goal;
        $nutrition->recipe_type = $request->recipe_type;
        $nutrition->recipe_no = $request->recipe_no;
        $nutrition->title = $request->recipee_title;
        $nutrition->serving = $request->serving;
        $nutrition->net_carbs = $request->net_carbs;
        $nutrition->protien = $request->protien;
        $nutrition->fat = $request->fat;
        $nutrition->about_recipee = $request->about_recipee;
        $nutrition->ingredients = $request->ingredients;


        if($nutrition->save()){
            session()->flash('message','Succefully Add Nutritions');
            return redirect('nutrition');
        }else{
            session()->flash('message','Not Add Nutritions');
            return redirect()->back();
        }
    }
    public function edit($id)
    {
        $nutrition = Nutrition::find($id);
        return view('Nutrition.add-nutritions',get_defined_vars());

    }
    public function delete($id)
    {
        $nutrition = Nutrition::where('id',$id)->delete();
        session()->flash('message','Delete Nutrition Succefully');
        return redirect('nutrition');
    }
    public function search(Request $request)
    {
                // dd($request->all());

        $month = $request->month;
        $year = $request->year;
        $week = $request->goal;
        $nutrition = Nutrition::where("month",$request->month)->where('year',$request->year)->where('goal',$request->goal)->get();
        // dd($search_result->toArray());
        return view('Nutrition.index-nutrition',get_defined_vars());
    }
}
