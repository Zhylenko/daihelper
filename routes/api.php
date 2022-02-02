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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::match(['post', 'get'], '/webhook/' . env('TELEGRAM_BOT_TOKEN'), 'App\Http\Controllers\WebhookController@index')
    ->name('api.webhook');

Route::match(['post', 'get'], '/exam/get/answer/{data}', 'App\Http\Controllers\ExamController@getAnswer')
    ->where('data', '^(?:(\d+)?\D+?(\d+))+$')
    ->name('api.exam.get.answer');