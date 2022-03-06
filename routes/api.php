<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use DefStudio\Telegraph\Models\TelegraphChat;

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


Route::get('/', function () {
    return response()->json([
        'message' => 'Welcome to the Telegraph API',
        'version' => '1.0.0',
    ]);
});

Route::get('/test', function () {
    $chat = TelegraphChat::find(1);
    $chat->markdown("*Hello!*\n\nI'm here!")->send();

    return response()->json([
        'message' => 'Success',
        'version' => '1.0.0',
    ]);
});
