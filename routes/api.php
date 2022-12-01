<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\MilitanteController;
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

Route::controller(RegisterController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
});


Route::middleware('auth:sanctum')->group( function () {
    Route::controller(MilitanteController::class)->group(function(){
        Route::get('getMilitantebyDoc', 'getMilitantebyDoc');
        Route::get('getMilitantebyId', 'getMilitantebyId');
        Route::get('getMilitantebyName', 'getMilitantebyName');
        Route::get('getFilesbyMilitante', 'getFilesbyMilitante');

    });
    Route::resource('militantes', MilitanteController::class);
});
