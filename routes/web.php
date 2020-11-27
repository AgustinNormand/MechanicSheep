<?php

use Illuminate\Support\Facades\Auth;
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

/* Static Views */

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('about', function () {
    return view('web.sections.static.about');
})->name('about');

Route::get('contact', function () {
    return view('web.sections.static.contact');
})->name('contact');

Route::get('faq', function () {
    return view('web.sections.static.faq');
})->name('faq');

Route::get('services', function () {
    return view('web.sections.static.services');
})->name('services');


/* Dynamic Views */

Auth::routes();

Route::get('change-password', [App\Http\Controllers\Auth\ChangePasswordController::class, 'index'])->name('change.password');

Route::post('change-password', [App\Http\Controllers\Auth\ChangePasswordController::class, 'store'])->name('change.password');

/* Profile Routes */

Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');

Route::put('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

/* Cars Routes */

Route::get("cars/locate", [App\Http\Controllers\CarController::class, 'getLocate'])->name('cars.locate');

Route::post("cars/locate", [App\Http\Controllers\CarController::class, 'pushLocate'])->name('cars.locate');

Route::resource("cars", App\Http\Controllers\CarController::class)->parameters(['cars' => 'vehiculo']);

/* Jobs Routes */

Route::get("jobs/{vehiculo}", [App\Http\Controllers\JobController::class, 'show'])->name('jobs.show')->middleware('auth');

Route::get('appointments', [App\Http\Controllers\AppointmentController::class, 'get'])->name('appointment.get')->middleware('auth');

Route::get('appointments/show', [App\Http\Controllers\AppointmentController::class, 'show'])->name('appointment.show')->middleware('auth');

Route::post('appointments', [App\Http\Controllers\AppointmentController::class, 'store'])->name('appointment.store')->middleware('auth');

/*Calendar route*/
Route::get('calendar', [App\Http\Controllers\CalendarController::class, 'view'])->name('calendar');
