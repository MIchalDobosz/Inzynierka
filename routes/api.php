<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\UserController;
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

// Public routes
Route::resource('recipes', RecipeController::class)->only(['index', 'show']);
Route::get('users/{user}', [UserController::class, 'show']);
Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);
Route::get('categories', [CategoryController::class, 'index']);

// Protected routes
Route::group(['middleware' => 'auth:sanctum'], function()
{
    Route::post('logout', [UserController::class, 'logout']);
    Route::resource('users', UserController::class, )->only(['update']);
    Route::resource('recipes', RecipeController::class)->only(['store', 'update', 'destroy']);
});
