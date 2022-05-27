<?php

use App\Http\Livewire\ShowBooking;
use App\Http\Livewire\CreateBooking;
use App\Http\Livewire\Laravelcharts;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\GraphController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\BarchartController;
use App\Http\Livewire\Select2;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/bookings/create', CreateBooking::class);
Route::get('bookings/{appointment:uuid}', ShowBooking::class)->name('bookings.show');
Route::get('pie-chart', [GraphController::class, 'index']);
Route::get('line-chart', [StudentController::class, 'index']);
Route::get('bar-graph', [DoctorController::class, 'index']);
Route::get('barchart',[BarchartController::class, 'barchart']);
Route::get('select2', Select2::class);
Route::get('/chart1', function ()  { 
    return view('bookings/laravelchart'); })->name('name');

require __DIR__.'/auth.php';
