<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ShoppingList\ItemController;
use App\Http\Controllers\ShoppingListController;
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

Route::group(['prefix' => 'auth'], function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('me', [AuthController::class, 'me']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('logout', [AuthController::class, 'logout']);
});
Route::group(['middleware' => 'auth'], function () {
    Route::resource('lists', ShoppingListController::class)->except(['edit', 'create']);
    Route::resource('lists.items', ItemController::class)->only(['store', 'update', 'destroy']);
});