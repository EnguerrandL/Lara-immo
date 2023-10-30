<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

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


Route::prefix('admin')->group(function () {
 Route::get('/property', [AdminController::class, 'index'])->name('admin.index');
 Route::get('/property/create', [AdminController::class, 'create'])->name('admin.create');
 Route::post('/property/create', [AdminController::class, 'store'])->name('admin.store');
 Route::delete('/property/{property}', [AdminController::class, 'destroy'])->name('admin.delete');


});