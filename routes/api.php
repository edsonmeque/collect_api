<?php

use Illuminate\Http\Request;
//is imports class controller
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UsersController;
use App\Http\Controllers\Api\ContentoresController;
use App\Http\Controllers\Api\PersonHomeController;
use App\Http\Controllers\Api\ContainerController;
use App\Http\Controllers\Api\CollectContainerController;

use App\Http\Resources\UserResource;

// route of authetication 
Route::post('/register',[UsersController::class,'register']);
Route::post('/login',[UsersController::class,'login']);

Route::get('/charts',[CollectContainerController::class,'charts']);

Route::get('/provinces',[PersonHomeController::class,'getAllProvince']);

Route::group(['middleware'=>'auth:sanctum'], function ()
{  
  //  Route::get('/users',[UsersController::class,'index']);
    Route::post('/upload',[ContainerController::class,'uplaodImage']);
    Route::post('/collect',[CollectContainerController::class,'realiseCollect']);
    //Route::post('/change',[CollectContainerController::class,'changeContainer']);
    Route::post('/change',[CollectContainerController::class,'change']);
    Route::get('/all-full',[CollectContainerController::class,'getAllContFull']);
    Route::get('/all-dislocated',[CollectContainerController::class,'getAllDataDislocated']);
    Route::post('/logout',[UsersController::class,'logout']);
    Route::get('/residente-contentores',[ContentoresController::class,'index']);
    Route::post('/residente-contentores',[ContentoresController::class,'updateUploadImagen']);
});


Route::middleware('auth:sanctum')->get('/users', function (Request $request) {
    return UserResource::make($request->user());
});
