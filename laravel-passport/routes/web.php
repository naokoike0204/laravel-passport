<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MstPrefectureController;
use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/customer', [CustomerController::class,'index'])->name('customer')->middleware('auth');
Route::get('/edit/{customer_id}', [CustomerController::class,'edit'])->name('customer.edit')->middleware('auth');
Route::post('/update/{customer_id}', [CustomerController::class,'update'])->name('customer.update')->middleware('auth');
Route::get('/delete/{customer_id}', [CustomerController::class,'delete'])->name('customer.delete')->middleware('auth');
Route::post('/delete/{customer_id}', [CustomerController::class,'delete'])->name('customer.delete')->middleware('auth');

Route::get('/prefecture', [MstPrefectureController::class,'get'])->name('prefecture');


require __DIR__.'/auth.php';
