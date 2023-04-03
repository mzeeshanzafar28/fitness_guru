<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\ExcerciseController;
use App\Http\Controllers\NutritionController;
use App\Http\Controllers\UserController;


Route::get('/login', [AdminAuthController::class, 'loginPage']);
Route::post('login', [AdminAuthController::class, 'login'])->name('login');
Route::group(['middleware' => 'auth'], function(){
    Route::get('logout', [AdminAuthController::class, 'logout']);
    Route::get('/', [AdminAuthController::class, 'dashboard']);
    Route::get('/users', [UserController::class, 'allUsers']);
    Route::get('/settings', [AdminAuthController::class, 'settingsPage']);
    Route::post('admin/update-password', [AdminAuthController::class, 'updatePassword']);

    Route::get('profile/{id}',[UserController::class,'profile_info']);
    Route::get('excercise',[ExcerciseController::class,'excercise_index']);
    Route::get('excercise/add',[ExcerciseController::class,'add_excercise']);
    Route::post('excercise/add',[ExcerciseController::class,'save_excercise']);
    Route::get('excercise/show',[ExcerciseController::class,'search']);
    Route::get('excercise/edit/{id}',[ExcerciseController::class,'edit']);
    Route::get('excercise/delete/{id}',[ExcerciseController::class,'delete']);

    Route::get('nutrition',[NutritionController::class,'index']);
    Route::get('nutrition/add',[NutritionController::class,'add']);
    Route::post('nutrition/add',[NutritionController::class,'store']);
    Route::get('nutrition/edit/{id}',[NutritionController::class,'edit']);
    Route::get('nutrition/show',[NutritionController::class,'search']);
    Route::get('nutrition/delete/{id}',[NutritionController::class,'delete']);




});
