<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgenceController;
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
$slugRegex = '[0-9a-z\-]+';
$idRegex = '[0-9]+';

Route::get('/', [AgenceController::class, 'index'])->name('agence.index'); 
Route::get('/biens/{slug}-{property}', [AgenceController::class, 'show'])->name('agence.show')->where([
    'slug' => $slugRegex,
    'property' => $idRegex,
]); 
Route::get('/tous-nos-biens', [AgenceController::class, 'listing'])->name('agence.listing');



Route::get('/search', [AgenceController::class, 'search'])->name('agence.search');
Route::post('proprerty/{property}/contact', [AgenceController::class, 'contact'])->name('agence.contact.form')
->where([
    'property' => $idRegex,
]); 



Route::prefix('admin')->group(function () {
 Route::get('/property', [AdminController::class, 'index'])->name('admin.index');
 Route::get('/property/create', [AdminController::class, 'create'])->name('admin.create');
 Route::post('/property/create', [AdminController::class, 'store'])->name('admin.store');
 Route::delete('/property/{property}', [AdminController::class, 'destroy'])->name('admin.delete');
 Route::get('/property/{property}', [AdminController::class, 'edit'])->name('admin.edit');
 Route::post('/property/{property}', [AdminController::class, 'update'])->name('admin.update');


 Route::get('/option', [AdminController::class, 'showOption'])->name('admin.option.show');
 Route::post('/option', [AdminController::class, 'optionStore'])->name('option.store');
 Route::get('/option/{option}', [AdminController::class, 'editOption'])->name('option.edit');
 Route::post('/option/{option}', [AdminController::class, 'optionUpdate'])->name('option.update');


 Route::delete('/option/{option}', [AdminController::class, 'deleteOption'])->name('admin.option.delete');


 Route::get('/property/{property}/{image}/delete', [AdminController::class, 'deleteImgFromProperty'])->name('admin.img.delete');

});