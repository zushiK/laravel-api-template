<?php

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('aaa', function () {
    return response()->json(
        [
            ["label" => 1],
            ["label" => 2],
            ["label" => 3],
            ["label" => 4],
            ["label" => 5],
            ["label" => 6],
            ["label" => 7],
            ["label" => 8],
            ["label" => 9],
            ["label" => 10]
        ]
    );
});
