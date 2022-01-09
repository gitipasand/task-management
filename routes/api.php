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

Route::post('/get-statistics','App\Http\Controllers\HomeController@getStatistics');
Route::post('/get-project-tasks','App\Http\Controllers\ProjectController@getProjectTasks');
Route::post('/task/sortable','App\Http\Controllers\TaskController@sort');
