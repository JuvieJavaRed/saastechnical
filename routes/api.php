<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [UsersController::class, 'registration']);
Route::post('/login', [UsersController::class, 'login']);

//Category API's
Route::get('/listallcategories', [CategoriesController::class, 'index']);


//Product API's
Route::get('/listallproducts', [ProductsController::class, 'index']);
Route::get('/retrievesingleproduct/{id}', [ProductsController::class, 'show']);

Route::middleware('auth:api')->post('/createaproduct',[ProductsController::class, 'store']);
Route::middleware('auth:api')->put('/updateaproduct',[ProductsController::class, 'update']);
Route::middleware('auth:api')->delete('/delete/{id}',[ProductsController::class, 'destroy']);
