<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\PermissionController;

Route::get('/', function () {
    return view('welcome');
});


// route::group(['middleware'=>['auth','role:super-admin'|'faculty-member']] ,function(){

//     route::resource('permissions',App\Http\Controllers\PermissionController::class);
//     route::get('permissions/{id}/delete',[App\Http\Controllers\PermissionController::class,'destroy']);

//     route::resource('roles',App\Http\Controllers\RoleController::class);
//     route::get('roles/{roleId}/delete',[App\Http\Controllers\RoleController::class,'destroy']);
//     route::get('roles/{roleId}/give-permission',[App\Http\Controllers\RoleController::class,'addPermissionToRole']);
//     route::put('roles/{roleId}/give-permission',[App\Http\Controllers\RoleController::class,'updatePermissionToRole']);

//     route::resource('users',App\Http\Controllers\UserController::class);
//     route::get('users/{userId}/delete',[App\Http\Controllers\UserController::class,'destroy']);

// });

route::resource('permissions',App\Http\Controllers\PermissionController::class);
route::get('permissions/{id}/delete',[App\Http\Controllers\PermissionController::class,'destroy']);

route::resource('roles',App\Http\Controllers\RoleController::class);
route::get('roles/{roleId}/delete',[App\Http\Controllers\RoleController::class,'destroy']);
route::get('roles/{roleId}/give-permission',[App\Http\Controllers\RoleController::class,'addPermissionToRole']);
route::put('roles/{roleId}/give-permission',[App\Http\Controllers\RoleController::class,'updatePermissionToRole']);

route::resource('users',App\Http\Controllers\UserController::class);
route::get('users/{userId}/delete',[App\Http\Controllers\UserController::class,'destroy']);





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';




// route::controller(PermissionController::class)->group(function(){
//     Route::get('permissions/create','create')->name('permission.create');
//     Route::get('permissions/index','index')->name('permission.index');
//     Route::post('permissions', 'store')->name('permission_store');
//     Route::get('permissions/{id}/edit', 'edit')->name('permission.edit');
//     Route::put('permissions/{id}/update', 'update')->name('permission.update');
//     Route::delete('permissions/{id}/delete', 'destroy')->name('permission.delete');
// });
