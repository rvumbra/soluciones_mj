<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

#region Landing de la web
Route::get('/', function () {
    return view('welcome');
});
#endregion

Route::middleware('auth')->group(function (){
    #region Home
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    #endregion
    #region Home
    Route::get('/list-users', function (){
        return view('userList.table');
    });
    #endregion

    #region Profile {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    #endregion);
});

require __DIR__.'/auth.php';
