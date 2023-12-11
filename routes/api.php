<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\StudentsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

    //does not need authentication to show
    Route::get('/books',[BooksController::class,'index']);
    Route::get('/book/{id}',[BooksController::class,'show']);

    //does not need authentication to show
    Route::get('/students',[StudentsController::class,'index']);
    Route::get('/student/{id}',[StudentsController::class,'show']);



     // need authentication to show
     //also need a bearer token
    Route::middleware('auth:sanctum')->group(function (){
  
    Route::post('/book',[BooksController::class,'store']);
    Route::put('/update',[BooksController::class,'update']);
    Route::delete('/book/{id}',[BooksController::class,'delete']);

    Route::post('/store',[StudentsController::class,'store']);
    Route::put('/update',[StudentsController::class,'update']);
    Route::delete('/student/{id}',[StudentsController::class,'delete']);
});

//authenticator
Route::post('/login',[AuthController::class,'login']);