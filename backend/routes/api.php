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

/*
 TODO: make api for authentication
 - auth -> ok
 - registration -> on todo
 - logout
 - getuser
 - expired
 - update
 - delete
 TODO: creata UI administration
 TODO: make api for several module such as roles, catalog, products, order, payment, banks, orders
*/
Route::prefix("v1")->group(function() {
    Route::post("/auth", "AuthController@Authenticate");
    Route::post("/save", "AuthController@Save");
    Route::put("/save", "AuthController@Save");
});

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
