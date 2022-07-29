<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ContainerController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\DistrictController;
use App\Http\Controllers\Admin\ProvinceController;
use App\Http\Controllers\Admin\TypeContainerController;
use App\Http\Controllers\Admin\CollectController;
use App\Http\Controllers\Admin\MunicipioController;
use App\Http\Controllers\Admin\LocalizationController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\CapacityController;
use App\Http\Controllers\Admin\ColorController;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



    


Route::middleware(['is_admin'])->name('admin.')->prefix('admin')->group(function () {
        Route::get('/',[AdminController::class,'index']);
        
        Route::get('/all-countries',[AdminController::class,'countries']);
        Route::get('/all-districts',[AdminController::class,'districts']);
        
        Route::middleware(['auth'])->group(function () {
        Route::get('/dashbord',[AdminController::class,'dashbord'])->name('dashbord.index');
        Route::get('/charts',[AdminController::class,'charts']);
        Route::resource('/containers',ContainerController::class);
        Route::resource('/countries',CountryController::class);
        Route::resource('/typecontainers',TypeContainerController::class);
        Route::resource('/provinces',ProvinceController::class);
        Route::resource('/districts',DistrictController::class);
        Route::resource('/users',UsersController::class);
        Route::resource('profile',ProfileController::class);
        Route::resource('/collects',CollectController::class);
        Route::resource('/municipios',MunicipioController::class);
        Route::resource('/localizations',LocalizationController::class);
        Route::resource('/capacities',CapacityController::class);
       Route::resource('/colors',ColorController::class);
       
});

//use App\Http\Controllers\Admin\AdminController;
//Route::get('/',[::class,'index']);
        
});
