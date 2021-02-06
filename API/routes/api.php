<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\EkskulController;
use App\Http\Controllers\KaryaController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\MateriController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/register', [UserController::class,'register']);
Route::post('/login', [UserController::class,'login']);

//Route::middleware(['jwt_verify'])->group(function(){
    Route::group(['prefix'=>'/profile'], function(){
        Route::get('',[ProfileController::class,'all']);
        Route::get('/{user_id}', [ProfileController::class, 'index']);
        Route::put('/{user_id}', [ProfileController::class, 'update']);
        Route::delete('/{user_id}',[ProfileController::class,'destroy']);
    });

    Route::group(['prefix'=>'/news'],function(){
        Route::get('',[NewsController::class,'index']);
        Route::get('/{id}',[NewsController::class,'detail']);
        Route::post('',[NewsController::class,'store']);
        Route::put('/{id}',[NewsController::class,'update']);
        Route::delete('/{id}',[NewsController::class,'destroy']);
    });

    Route::group(['prefix'=>'/jurusan'],function(){
        Route::get('',[JurusanController::class,'index']);
        Route::get('/{id}',[JurusanController::class,'detail']);
        Route::post('',[JurusanController::class,'store']);
        Route::put('/{id}',[JurusanController::class,'update']);
        Route::delete('/{id}',[JurusanController::class,'destroy']);
    });

    Route::group(['prefix'=>'/ekskul'],function(){
        Route::get('',[EkskulController::class,'index']);
        Route::get('/{id}',[EkskulController::class,'detail']);
        Route::post('',[EkskulController::class,'store']);
        Route::put('/{id}',[EkskulController::class,'update']);
        Route::delete('/{id}',[EkskulController::class,'destroy']);
    });

    Route::group(['prefix'=>'/ekskul'],function(){
        Route::get('',[EkskulController::class,'index']);
        Route::get('/{id}',[EkskulController::class,'detail']);
        Route::post('',[EkskulController::class,'store']);
        Route::put('/{id}',[EkskulController::class,'update']);
        Route::delete('/{id}',[EkskulController::class,'destroy']);
    });

    Route::group(['prefix'=>'/karya'],function(){
        Route::get('',[KaryaController::class,'index']);
        Route::get('/{id}',[KaryaController::class,'detail']);
        Route::post('',[KaryaController::class,'store']);
        Route::put('/{id}',[KaryaController::class,'update']);
        Route::delete('/{id}',[KaryaController::class,'destroy']);
    });

    Route::group(['prefix'=>'/karya'],function(){
        Route::get('',[KaryaController::class,'index']);
        Route::get('/{id}',[KaryaController::class,'detail']);
        Route::post('',[KaryaController::class,'store']);
        Route::put('/{id}',[KaryaController::class,'update']);
        Route::delete('/{id}',[KaryaController::class,'destroy']);
    });

    Route::group(['prefix'=>'/mapel'],function(){
        Route::get('',[MapelController::class,'index']);
        Route::get('/{id}',[MapelController::class,'detail']);
        Route::post('',[MapelController::class,'store']);
        Route::put('/{id}',[MapelController::class,'update']);
        Route::delete('/{id}',[MapelController::class,'destroy']);
    });

    Route::group(['prefix'=>'/materi'],function(){
        Route::get('',[MateriController::class,'index']);
        Route::get('/{id}',[MateriController::class,'detail']);
        Route::post('',[MateriController::class,'store']);
        Route::put('/{id}',[MateriController::class,'update']);
        Route::delete('/{id}',[MateriController::class,'destroy']);
    });
//});