
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;


Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'user'],function(){
    Route::group(['prefix'=>'/login', 'middleware'=>'user.notLogged'],function(){
        Route::get("",[UserController::class, "login"])->name("user.login");
        Route::post("",[UserController::class,"loginPost"])->name("user.loginPost");
    });

    Route::get("logout",[UserController::class,"logout"])->name("user.logout");

    Route::group(['middleware'=>'UserLoggedMiddleware'],function(){
        Route::get("home",[UserController::class,"home"])->name("user.home");
    });
    
});


