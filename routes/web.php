<?php

use App\Http\Controllers\SiteController;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get("/", [SiteController::class, "index"])->name('form.ci');
Route::post("/", [SiteController::class, "validate_ci"])->name('form.ci.query');

Route::get("/data/{ci}/list", [SiteController::class, "list_data"])->name('form.list.data');
Route::get("/data/{ci}/add", [SiteController::class, "add_data"])->name('form.add.data');
Route::post("/data/{ci}/save", [SiteController::class, "store"])->name('form.data.store');
