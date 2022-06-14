<?php

use App\Http\Controllers\flowerController;
use App\Http\Controllers\userController;
use App\Http\Controllers\genresController;
use App\Http\Controllers\cartController;
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

Route::middleware(['auth'])->group(function(){

    Route::name('/')->prefix('/')->group(function () {
   
        // Dashboard
        Route::get('dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

        // Flowers
        Route::get('flowers',[flowerController::class, 'index'])->name('flowers');
        Route::get('add-flowers',[flowerController::class, 'create'])->name('add-flowers');
        Route::post('add-flowers',[flowerController::class, 'store'])->name('add-flowers');
        Route::get('edit-flowers/{id}',[flowerController::class, 'edit'])->name('edit-flowers');
        Route::put('update-flowers/{id}',[flowerController::class, 'update'])->name('update-flowers');
        Route::delete('delete-flowers/{id}',[flowerController::class, 'destroy'])->name('delete-flowers'); 
        
        // Cart
        Route::get('cart',[cartController::class, 'index'])->name('cart');

        // Users
        Route::get('users',[userController::class, 'index'])->name('users');
        Route::delete('delete-users/{id}',[userController::class, 'destroy'])->name('delete-users'); 

        //Genres
        Route::get('genres',[genresController::class, 'index'])->name('genres');
    });

});

require __DIR__.'/auth.php';





