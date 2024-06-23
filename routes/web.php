<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FestController;
use Illuminate\Support\Facades\Route;

#region Landing de la web
Route::get('/', function () {
    return view('welcome');
});
#endregion

Route::middleware('auth')->group(function (){

    #region Home
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/home/get-fests', [FestController::class, 'getFestToCalendar']);
    #endregion

    #region Lista de días festivos
    Route::get('/list-fest', [FestController::class, 'index'])->name('festList.table');
    Route::post('/list-fest', [FestController::class, 'store']);
    Route::post('/list-fest/{id}', [FestController::class, 'update']);
    Route::delete('/list-fest/{id}', [FestController::class, 'destroy']);
    #endregion
    
    #region Lista de usuarios
    Route::get('/list-users', [UserController::class, 'index'])->name('userList.table');
    Route::post('/list-users', [UserController::class, 'store']);
    Route::post('/list-users/{id}', [UserController::class, 'update']);
    Route::delete('/list-users/{id}', [UserController::class, 'destroy']);
    #endregion

    #region Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    #endregion
});

require __DIR__.'/auth.php';
