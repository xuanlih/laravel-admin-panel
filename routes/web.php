<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('index');
});

Route::post('/layout/login', [AuthController::class, 'login']);
Route::post('/layout/register', [AuthController::class, 'register']);

Route::view('/', 'index');
Route::view('/layout/login', 'layout.login')->name('login');
Route::get('/layout/register', [AdminController::class, 'getRoleList'])->name('register');

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/')->with('success', 'You have been logged out.');
})->name('logout');

Route::get('/layout/admin', [AdminController::class, 'admin'])->name('admin');
Route::get('/layout/role', [RoleController::class, 'role'])->name('role');
Route::post('/layout/addRole', [RoleController::class, 'addRole']);
Route::get('/layout/addRole', function () {
    return view('layout.addRole');
})->name('addRole');

Route::get('/admin/{id}/edit', [AuthController::class, 'edit'])->name('admin.edit');
Route::post('/admin/{id}/update', [AuthController::class, 'update'])->name('admin.update');

Route::get('/layout/user', [UserController::class, 'user'])->name('user');
