<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\VerificationMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserAuthController extends Controller
{
    public function register(Request $request){
        $validations = [
            'name'=> 'required',
            'email'=> 'required|email|unique:users',
            'phone'=> 'required||unique:users',
            'password'=> 'required|min:8|confirmed',
        ];
        $request->validate($validations);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->save();
        $this->sendEmailCode($user->email);
        return response()->json(['message'=>'You are registered successfully!', 'user' => $user], 200);
    }
    public function sendEmailCode($email){
        $user = User::where('email', $email)->first();
        $emailCode = rand(111111, 999999);
        $data = [
            'subject' => 'Verify your email',
            'title' => 'Welcome to FitnessGuru',
            'message' => 'Please verify your email address by using this code below',
            'code' => $emailCode,
        ];
        Mail::to($user->email)->send(new VerificationMail($data));
        $user->code = $emailCode;
        $user->save();
    }
    public function resendEmailCode(Request $request){
        $request->validate([
            'email' => 'required|email',
        ]);
        $this->sendEmailCode($request->email);
        return response()->json(['message' => 'Verification code sent successfully to your email successfully'], 200);
    }
    public function verifyUserEmail(Request $request){
        $request->validate([
            'email' => 'required|email',
            'code' => 'required|min:6',
        ]);
        $user = User::where('email', $request->email)->first();
        if($user->code == $request->code){
            $user->code = null;
            $user->email_verified_at = date('Y-m-d');
            $user->save();
            $user = User::where('email', $request->email)->first();
            Auth::login($user);
            $token = $request->user()->createToken('user_token')->plainTextToken;
            return response()->json([
                'message' => 'Your email has been verified successfully',
                'user' => $user,
                'token' => $token,
            ]);
        }else{
            return response()->json(['message' => 'Invalid code. Please Try Again'], 422);
        }
    }
    public function login(Request $request)
    {
        $validations = [
            'email' => 'email|required',
            'password' => 'required',
        ];
        $request->validate($validations);
        $user = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        $check = User::where('email', $request->email)->first();
        if($check){
            if($check->email_verified_at){
                if (Auth::attempt($user)) {
                    $user = User::find(Auth::id());
                    $token = $request->user()->createToken('user_token')->plainTextToken;
                    return response()->json([
                        'message' => 'Logged In successfully',
                        'screen' => 'home',
                        'user' => $user,
                        'token' => $token,
                    ]);
                } else {
                    return response()->json(['message' => 'Invalid email or password!'], 422);
                }
            }else{
                $this->sendEmailCode($request->email);
                return response()->json(['message' => 'User not verified','screen' => 'verify-email','user' => $check], 200);
            }
        }else{
            return response()->json(['message' => 'Invalid email or password!'], 422);
        }
    }
    public function resetPassword(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);
        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();
        return response()->json(['message' => 'Password updated successully'], 200);
    }
    public function updatePassword(Request $request){
        $userId = $request->user_id;
        $request->validate([
            'new_password' => 'required',
            'confirm_password' => 'required',
        ]);
        if ($request->new_password == $request->confirm_password) {
            $user = User::find($userId);
            $user->password = Hash::make($request->new_password);
            $user->save();
            return response()->json(['message' => 'Password updated successully'], 200);
        }else{
            return response()->json(['message' => 'Confirm Password does not match'], 422);
        }
    }
    public function logout(Request $request)
    {
        $request->user_id->tokens()->delete();
        // auth('sanctum')->user()->tokens()->delete();
        return response()->json(['message' => 'Logged out successfully'], 200);
    }
}
