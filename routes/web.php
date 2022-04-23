<?php

use App\Http\Controllers\ContactController;
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

Route::get('/', function () {
    return redirect('/contact');
});

Route::get('login', [UserController::class, 'index'])->name('login');
Route::post('login', [UserController::class, 'login'])->name('login');

Route::get('contact', [ContactController::class, 'index'])->name('contact.index');

Route::group(['middleware' => 'auth'], function () {
    Route::get('logout', [UserController::class, 'logout'])->name('logout');
    Route::get('contact/create', [ContactController::class, 'create'])->name('contact.create');
    Route::post('contact', [ContactController::class, 'store'])->name('contact.store');
    Route::get('contact/{id}', [ContactController::class, 'show'])->name('contact.show');
    Route::get('contact/{id}/edit', [ContactController::class, 'edit'])->name('contact.edit');
    Route::put('contact/{id}', [ContactController::class, 'update'])->name('contact.update');
    Route::delete('contact/{id}', [ContactController::class, 'destroy'])->name('contact.destroy');
});
