<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\flowerController;
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
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get('/flowers',[flowerController::class, 'index'])->name('flowers');
Route::get('/add-flowers',[flowerController::class, 'create'])->name('add-flowers');
Route::post('/add-flowers',[flowerController::class, 'store'])->name('add-flowers');
Route::get('/edit-flowers/{id}',[flowerController::class, 'edit'])->name('edit-flowers');
Route::put('/update-flowers/{id}',[flowerController::class, 'update'])->name('update-flowers');
Route::delete('/delete-flowers/{id}',[flowerController::class, 'destroy'])->name('delete-flowers');


