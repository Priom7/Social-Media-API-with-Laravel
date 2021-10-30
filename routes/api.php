<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FollowingController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/person/feed', [PostController::class, 'index']);
Route::post('/follow/person/{personId}', [FollowingController::class, 'person_follow_create']);
Route::post('/follow/page/{pageId}', [FollowingController::class, 'page_follow_create']);
Route::post('/page/create', [PageController::class, 'create']);
Route::post('/person/attach-post', [PostController::class, 'person_create']);
Route::post('/page/{pageId}/attach-post', [PostController::class, 'page_create']);



Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'signup']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});
