<?php
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\Question\QuestionController;
use App\Http\Controllers\Admin\Comment\CommentController;

    Route::get('/', function () {
        return "welcome to internal point";
    });

    Route::group(['prefix'=>'/login','middleware'=>'admin.notLogged'],function(){
        Route::get("",[AuthController::class,"login"])->name('admin.login');
        Route::post("",[AuthController::class,"loginPost"])->name('admin.loginPost');
    });
    Route::get("logout",[AuthController::class,"logout"])->name('admin.logout');

    Route::group(['middleware'=>'admin.logged'], function(){
        Route::get("home",[HomeController::class,"home"])->name('admin.home');

        Route::group(['prefix'=>'/admins'],function(){
            Route::get("",[AdminController::class,"getAll"])->name('admin.index');
            Route::get("edit/{admin}",[AdminController::class,"adminEdit"])->name('admin.edit');
            Route::post("update/{admin}",[AdminController::class,"adminUpdate"])->name('admin.update');
            Route::get("delete/{admin}",[AdminController::class,"adminDelete"])->name('admin.delete');
        });

        Route::group(['prefix'=>'/questions'],function(){
            Route::get("",[QuestionController::class,"index"])->name("question.index");
        });

        Route::group(['prefix'=>'/comments'],function(){
            Route::get("",[CommentController::class,"index"])->name("comment.index");
        });
     
       
        
    });


