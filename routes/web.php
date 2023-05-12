<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/", [CityController::class, "index"])->name("home.index");
Route::get("/user/create", [UserController::class, "create"])->name("user.create");
Route::post("/user", [UserController::class, "store"])->name("user.store");


Route::get("/feedbacks/{city}", [FeedbackController::class, "index"])->name("feedbacks.index");
Route::get("/feedback/create", [FeedbackController::class, "create"])->name("feedback.create");
Route::post("/feedback", [FeedbackController::class, "store"])->name("feedback.store");