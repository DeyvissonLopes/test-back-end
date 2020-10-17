<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\UserController;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Rota para logar o usuário.
Route::post('auth/login', [AuthController::class, 'login']);

// Rotas de autenticação do usuário.
Route::group(['middleware' => ['apiJwt'], 'prefix' => 'auth'], function() {
    
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('me', [AuthController::class,'me']);
    Route::post('refresh', [AuthController::class,'refresh']);

});

// Rotas CRUD dos produtos
Route::group(['middleware' => ['apiJwt'], 'prefix' => 'products'], function() {
    
    Route::get('/', [ProductController::class, 'index']);
    Route::get('/show/{product}', [ProductController::class, 'show']);
    Route::post('/store', [ProductController::class, 'store']);
    Route::post('/update/{product}', [ProductController::class, 'update']);
    Route::delete('/delete/{product}', [ProductController::class, 'destroy']);

});

// Rotas CRUD de usuários (only get all users)
Route::group(['middleware' => ['apiJwt'], 'prefix' => 'users'], function() {
    
    Route::get('/', [UserController::class, 'index']);

});

