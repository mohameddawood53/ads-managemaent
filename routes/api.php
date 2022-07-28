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
Route::group(["prefix" => "category"] , function ()
{
    Route::get("/{id}" , [\App\Http\Controllers\Api\CategoryController::class , "show"]);
    Route::post("/{id}" , [\App\Http\Controllers\Api\CategoryController::class , "update"]);
    Route::delete("/{id}" , [\App\Http\Controllers\Api\CategoryController::class , "destroy"]);
});
Route::post("/add-new-category" , [\App\Http\Controllers\Api\CategoryController::class , "store"]);

//Tags Routes
Route::get("tags" , [\App\Http\Controllers\Api\TagController::class , "index"]);
Route::group(["prefix" => "tag"] , function ()
{
    Route::get("/{id}" , [\App\Http\Controllers\Api\TagController::class , "show"]);
    Route::post("/{id}" , [\App\Http\Controllers\Api\TagController::class , "update"]);
    Route::delete("/{id}" , [\App\Http\Controllers\Api\TagController::class , "destroy"]);
});
Route::post("/add-new-tag" , [\App\Http\Controllers\Api\TagController::class , "store"]);

//Ads Routes
Route::group(["prefix" => "ads"] , function (){
    Route::get("/" , \App\Http\Controllers\Api\AdController::class );
});

//Advertiser Routes
Route::group(["prefix" => "advertiser"] , function (){
    Route::get("/{id}/ads" , \App\Http\Controllers\Api\AdvertiserController::class);
});

