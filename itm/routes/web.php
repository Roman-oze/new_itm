<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\PermissionController;

Route::get('/', function () {
    return view('welcome');
});

route::resource('permissions',App\Http\Controllers\PermissionController::class);
route::get('permissions/{id}/update',[App\Http\Controllers\PermissionController::class,'update']);
route::put('permissions/{id}/delete',[App\Http\Controllers\PermissionController::class,'destroy']);

// route::controller(PermissionController::class)->group(function(){
//     Route::get('permissions/create','create')->name('permission.create');
//     Route::get('permissions/index','index')->name('permission.index');
//     Route::post('permissions', 'store')->name('permission_store');
//     Route::get('permissions/{id}/edit', 'edit')->name('permission.edit');
//     Route::put('permissions/{id}/update', 'update')->name('permission.update');
//     Route::delete('permissions/{id}/delete', 'destroy')->name('permission.delete');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
