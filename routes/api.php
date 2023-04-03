<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ExcerciseController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\AvartarController;
use App\Http\Controllers\StaticController;

// Auth Routes
Route::post('auth/register', [UserAuthController::class, 'register']);
Route::post('auth/resend-email-verification-code', [UserAuthController::class, 'resendEmailCode']);
Route::post('auth/verify-user-email', [UserAuthController::class, 'verifyUserEmail']);
Route::post('auth/login', [UserAuthController::class, 'login']);
Route::post('auth/forgot-password', [UserAuthController::class, 'resendEmailCode']);
Route::post('auth/reset-password', [UserAuthController::class, 'resetPassword']);




    Route::post('auth/logout', [UserAuthController::class, 'logout']);
    Route::post('user/update-password', [UserAuthController::class, 'updatePassword']);
    Route::post('user/profile_gender',[UserProfileController::class,'profile_gender']);
    Route::post('user/profile_pic',[UserProfileController::class,'profile_pic']);
    Route::post('user/profile_goal',[UserProfileController::class,'profile_goal']);
    Route::post('user/profile_activity',[UserProfileController::class,'profile_activity']);
    Route::post('user/profile_birth',[UserProfileController::class,'profile_birth']);
    Route::post('user/profile_height',[UserProfileController::class,'profile_height']);
    Route::post('user/profile_weight',[UserProfileController::class,'profile_weight']);

    // Profile info
    Route::get('user/my_profile/{user_id}',[UserProfileController::class,'my_profile']);

    // user Excercise
    Route::post('user/createPlan',[PlanController::class, 'add_user_excercise']);
    Route::post('user/find_excercise',[PlanController::class, 'find_excercise']);
    Route::post('user/find_nutrition',[PlanController::class, 'find_nutrition']);

    // Avatar
    Route::get('male/avatar',[AvartarController::class, 'avatar_male']);
    Route::get('female/avatar',[AvartarController::class, 'avatar_female']);
    Route::post('user/update_profile',[AvartarController::class, 'update_avatar']);

    // update Excercise and nutrition

    Route::post('user/excercise_user',[PlanController::class, 'update_excercise']);
    Route::post('user/nutrition_user',[PlanController::class, 'update_nutrition']);

    Route::post('user/get_burncalories',[PlanController::class, 'get_burncalories']);

    // static
    Route::post('user/static',[StaticController::class, 'static']);
    // water tracker
    Route::post('user/water_tracker',[StaticController::class, 'water_tracker']);
    Route::post('user/decrease_tracker',[StaticController::class, 'decrease_water_tracker']);
    Route::get('user/get_water_tracker/{user_id}',[StaticController::class, 'get_water_tracker']);
    Route::get('user/get_lastwater_track/{user_id}',[StaticController::class, 'get_lastwater_track']);

    // weight tracker
    Route::post('user/update_weight',[UserProfileController::class, 'update_weight']);
    Route::get('user/last_weight/{user_id}',[UserProfileController::class, 'last_weight']);
    Route::get('user/weight_chart/{user_id}',[UserProfileController::class, 'weight_chart']);

    Route::get('user/calories/{user_id}',[StaticController::class, 'calories']);


    // Route::group(['middleware' => 'auth:sanctum'], function(){
// });
