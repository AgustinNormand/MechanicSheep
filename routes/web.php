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
