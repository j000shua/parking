<?php

use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PlaceController;
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
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function(){
    Route::get('/',function () {
        return view('admin.index');
    })->name('admin');

    Route::resource('places', PlaceController::class, ['middleware'=>'valid']);

    Route::resource('users', UserController::class);
    Route::patch('users/{user}/valid', [UserController::class, 'valid'])->name('users.valid');

    Route::get('list',function () {
        return view('admin.index');
    })->name('admin.list');
});
//Route::group(['middleware'=>'valid'], function(){
    Route::resource('app', ReservationController::class);
//});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
