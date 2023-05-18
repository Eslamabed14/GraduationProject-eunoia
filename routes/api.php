<?php

use App\Http\Controllers\API\ActivitiesController;
use App\Http\Controllers\API\ApianswerController;
use App\Http\Controllers\API\ApiquestionController;
use App\Http\Controllers\API\ApisurveyController;
use App\Http\Controllers\API\AppointmentController;
use App\Http\Controllers\API\AppointmentsController;
use App\Http\Controllers\API\ArtsController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\DiseaseController;
use App\Http\Controllers\API\LifestyleController;
use App\Http\Controllers\API\MentalGamesController;
use App\Http\Controllers\API\ModeController;
use App\Http\Controllers\API\movesController;
use App\Http\Controllers\API\ProfileController;
use App\Http\Controllers\API\SentimenstController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Profiler\Profile;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::get('checkBookDate', [AppointmentsController::class, 'checkBookDate']);
Route::get('SplitTime', [AppointmentsController::class, 'SplitTime']);


// Route::put('updatedata/{id}', [ProfileController::class, 'update']);

Route::resource('diseases', DiseaseController::class);

Route::resource('mentalgames', MentalGamesController::class);
Route::get('randomgame', [MentalGamesController::class, 'randomGame']);

Route::resource('activities', ActivitiesController::class);

Route::resource('arts', ArtsController::class);
Route::post('art/track/{id}', [ArtsController::class, 'tracking']);

Route::resource('moves', movesController::class);
Route::post('move/track/{id}', [movesController::class, 'tracking']);

Route::resource('lifestyles', LifestyleController::class);
Route::put('user/temp/{id}', [LifestyleController::class, 'temp']);
Route::put('user/water/{id}', [LifestyleController::class, 'water']);
Route::put('user/sleep/{id}', [LifestyleController::class, 'sleep']);

Route::resource('answers', ApianswerController::class);
Route::resource('surveys', ApisurveyController::class);
Route::get('survey/question/{id}',[ApisurveyController::class,'survey_question']);

Route::get('user/level/{id}', [ProfileController::class, 'result']);

Route::resource('users', ProfileController::class);
Route::put('users/s_score/{id}', [ProfileController::class, 'updateSurveyScore']);

Route::middleware('auth:api')->group(function(){
    Route::post('appointment/book', [AppointmentController::class, 'store']);
    Route::post('mode/{id}', [ModeController::class, 'updatemode']);
    Route::post('senti/{id}', [SentimenstController::class, 'store']);
    Route::get('senti/{id}', [SentimenstController::class, 'show']);
});


