<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
//Categories Routes
Route::get("/categories" , [\App\Http\Controllers\Api\CategoryController::class , "index"]);
Route::get("/category/{id}" , [\App\Http\Controllers\Api\CategoryController::class , "show"]);
Route::post("/category/{id}" , [\App\Http\Controllers\Api\CategoryController::class , "update"]);
Route::delete("/category/{id}" , [\App\Http\Controllers\Api\CategoryController::class , "destroy"]);
Route::post("/add-new-category" , [\App\Http\Controllers\Api\CategoryController::class , "store"]);

