<?php

use App\Http\Controllers\ItemController;
use App\Models\Item;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

#Items
Route::get('/items', [ItemController::class, 'index']); #which controller and which class to use 

Route::prefix('/item') -> group(function(){
    Route::post('store', [ItemController::class, 'store']); #create / store function
    Route::put('{id}', [ItemController::class, 'update']); #find the id to update
    Route::delete('{id}', [ItemController::class, 'destroy']);
});

 

