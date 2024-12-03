<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\Admin\MoiveController as MoiveControllerAdmin;
use App\Http\Controllers\AuthoController;
use App\Http\Middleware\CheckAuth;
use App\Http\Controllers\Client\UserController;
use App\Http\Controllers\Admin\UserController as AdminUserController;


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

Route::get('/' , [HomeController::class , 'index'])->name('home');

Route::middleware(['auth', CheckAuth::class])->prefix('admin/moives')->group(function(){
    Route::get('/',           [MoiveControllerAdmin::class, 'index'])->name('moives.index')->middleware('auth');
    Route::get('/create',     [MoiveControllerAdmin::class, 'create'])->name('moives.create');
    Route::post('/create',     [MoiveControllerAdmin::class, 'store'])->name('moives.store');
    Route::get('/edit/{id}',  [MoiveControllerAdmin::class, 'edit'])->name('moives.edit');
    Route::put('/edit/{id}',  [MoiveControllerAdmin::class, 'update'])->name('moives.update');
    Route::get('/detail/{id}',[MoiveControllerAdmin::class, 'detail'])->name('moives.detail');

    Route::get('/list_user', [AdminUserController::class, 'index'])->name('list_user');

    Route::put('user.updateStatus/{id}',[AdminUserController::class,'Active']) -> name('user.updateStatus');
    Route::delete('/delete/{id}',[MoiveControllerAdmin::class, 'destroy'])->name('moives.destroy');

    Route::post('/search' , [MoiveControllerAdmin::class , 'search'])->name('search');
});

Route::get('/login',     [AuthoController::class, 'login'])->name('login');
Route::post('/login',    [AuthoController::class, 'postLogin']);
Route::get('/register',  [AuthoController::class, 'register'])->name('register');
Route::post('/register', [AuthoController::class, 'postRegister']);
Route::get('/logout',    [AuthoController::class, 'logout'])->name('logout');


Route::middleware(['auth'])->group(function(){
    Route::get('detail',          [UserController::class, 'profile'])->name('detail');
    Route::get('update_user',     [UserController::class, 'update_user'])->name('update_user');
    Route::put('update_user',     [UserController::class, 'update_userPost']);
    Route::get('update_password', [UserController::class, 'update_password'])->name('update_password');
    Route::put('update_password',     [UserController::class, 'update_passwordPost']);

});






