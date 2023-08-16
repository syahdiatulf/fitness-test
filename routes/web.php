<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('logout', [App\Http\Controllers\UserController::class, 'logout'])->name('logout');

Route::get('/roles-index', [App\Http\Controllers\RoleController::class, 'index'])->name('roles.index');
Route::get('/role-create', [App\Http\Controllers\RoleController::class, 'create'])->name('roles.create');
Route::post('/role-store', [App\Http\Controllers\RoleController::class, 'store'])->name('roles.store');
Route::get('/role-edit/{id}', [App\Http\Controllers\RoleController::class, 'edit'])->name('roles.edit');
Route::post('/role-update/{id}', [App\Http\Controllers\RoleController::class, 'update'])->name('roles.update');
Route::delete('/role-delete/{role}', [App\Http\Controllers\RoleController::class, 'destroy'])->name('roles.destroy');

Route::get('/permission-index', [App\Http\Controllers\PermissionController::class, 'index'])->name('permissions.index');
Route::get('/permission-create', [App\Http\Controllers\PermissionController::class, 'create'])->name('permissions.create');
Route::post('/permission-store', [App\Http\Controllers\PermissionController::class, 'store'])->name('permissions.store');
Route::get('/permission-edit/{id}', [App\Http\Controllers\PermissionController::class, 'edit'])->name('permissions.edit');
Route::post('/permission-update/{id}', [App\Http\Controllers\PermissionController::class, 'update'])->name('permissions.update');
Route::delete('/permission-delete/{permission}', [App\Http\Controllers\PermissionController::class, 'destroy'])->name('permissions.destroy');

Route::get('/user-index', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
//Route::get('/view', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
Route::get('/user-edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
Route::post('/user-update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
Route::delete('/user-delete/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/fitness-classes', [App\Http\Controllers\FitnessClassController::class, 'index'])->name('fitness.index');
Route::get('/fitness-classes/create', [App\Http\Controllers\FitnessClassController::class, 'create'])->name('fitness.create');
Route::post('/fitness-classes/store', [App\Http\Controllers\FitnessClassController::class, 'store'])->name('fitness.store');
