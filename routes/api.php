<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\DocumentController;

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


Route::get('/adnane', function () {
    $u = User::query()->where('id', 1)
        ->first();
    return $u->createToken('some_name')->plainTextToken;
});


Route::middleware('auth:sanctum')->get('/salim', function () {
    return ['msg' => 'Hello'];
});

Route::prefix('document')->group(function () {
    Route::resource('/', DocumentController::class);
    Route::get('/search/{keyword}', [DocumentController::class , 'search_documents']);
});

Route::prefix('books')->group(function () {
    Route::get('/', [DocumentController::class , 'get_books']);
    Route::get('/search/{keyword}', [DocumentController::class , 'search_books']);
});


