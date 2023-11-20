
<?php

use App\Http\Controllers\User\Comment\CommentController;
use App\Http\Controllers\User\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\Question\QuestionController;
use App\Http\Controllers\User\RegisterController;



Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'user'],function(){

    Route::group(['prefix'=>'/register'],function(){
        Route::get("",[RegisterController::class,"register"])->name("user.register");
        Route::post("",[RegisterController::class,"registerPost"])->name("user.registerPost");
    }); 
    Route::group(['prefix'=>'/login', 'middleware'=>'user.notLogged'],function(){
        Route::get("",[AuthController::class, "login"])->name("user.login");
        Route::post("",[AuthController::class,"loginPost"])->name("user.loginPost");  
    });

    Route::group(['middleware'=>'user.logged'],function(){
        Route::group(['prefix'=>'/home'],function(){
            Route::get("",[HomeController::class,"home"])->name("user.home");
            Route::post("",[QuestionController::class,"questionPost"])->name("user.questionPost");

            Route::group(['prefix'=>'/comment'],function(){
                Route::get("", [CommentController::class, "commentGetAll"])->name("user.commentGetAll");
                Route::post("", [CommentController::class, "commentPost"])->name("user.commentPost");
            });
        }); 
    });
    Route::get("logout",[AuthController::class,"logout"])->name("user.logout");
    


  


});


