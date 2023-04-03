<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Excercise;
use App\Models\Nutrition;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class AdminAuthController extends Controller
{
    public function loginPage(){
        if(Auth::check()){
            return redirect('/');
        }
        return view('Auth.Login');
    }
    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        $check = User::where('email', $request->email)->first();
        if($check && $check->user_type == 1){
            if(Auth::attempt($data)){
                return redirect('/');
            }else{
                $request->session()->flash('error', 'Invalid email or password');
                return redirect()->back();
            }
        }else{
            $request->session()->flash('error', 'Invalid login email address');
            return redirect()->back();
        }
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->flash('success', 'Logged out successfully');
        return redirect('login');
    }
    public function settingsPage(){
        return view('Settings');
    }
    public function updatePassword(Request $request){
        $request->validate([
            'password' => 'required|min:8|confirmed'
        ]);
        $user = User::find(Auth::id());
        $user->password = Hash::make($request->password);
        $user->save();
        $request->session()->flash('success', 'Password updated successfully');
        return redirect()->back();
    }
    public function dashboard(){
        $current_month = Carbon::now()->format('F');
        $users = User::where('user_type', 0)->orderBy('id', 'DESC')->get();
        $totalUsers = count($users);
        $total_excercise = Excercise::where('month',$current_month)->count();
        $total_nutrition = Nutrition::where('month',$current_month)->count();
        return view('Dashboard', get_defined_vars());
    }
}
