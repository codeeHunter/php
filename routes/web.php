<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\HomeController;
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
Auth::routes(["verify" => true]);

Route::get("/", [HomeController::class, 'index'])->name("home.index");

Route::get("/home", [CityController::class, "index"])->name("cities.index");
Route::get("/user/create", [UserController::class, "create"])->name("user.create");
Route::post("/user", [UserController::class, "store"])->name("user.store");

Route::get("/feedback/create", [FeedbackController::class, "create"])->name("feedback.create");
Route::get("/feedbacks/{city}", [FeedbackController::class, "index"])->name("feedbacks.index");
Route::delete("/feedbacks/{city}/{feedback}", [FeedbackController::class, "destroy"])->name("feedback.delete");
Route::get("/feedbacks/{city}/{feedback}", [FeedbackController::class, "edit"])->name("feedback.show");
Route::post("/feedback", [FeedbackController::class, "store"])->name("feedback.store");
Route::patch("/feedbacks/{city}/{feedback}", [FeedbackController::class, "update"])->name("feedback.update");