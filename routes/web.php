<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiDataController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/Show_Data', function () {
    return view('ShowData');
});

Route::Post('/Hello',[ApiDataController::class,'showRecords']);
