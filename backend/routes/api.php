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
 - registration -> ok
 - logout -> ok
 - getuser -> ontodo
 - expired -> ok
 - update
 - delete
 TODO: creata UI administration
 TODO: make api for several module such as roles, catalog, products, order, payment, banks, orders
*/
Route::prefix("v1")->group(function() {
    Route::prefix('auth')->group(function() {
        Route::post("/", "AuthController@Authenticate");
        Route::post("/save", "AuthController@Save");
        Route::put("/save", "AuthController@Save");
        Route::post("/logout", "AuthController@Logout")->middleware('auth:sanctum');
    });

    Route::prefix('user')->group(function() {

    });
});

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
