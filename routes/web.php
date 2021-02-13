<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\UserPageController;
use App\Http\Controllers\NewPostController;
use App\Http\Controllers\ReadPostController;
use App\Http\Controllers\EditPostController;
use App\Http\Controllers\DeletePostController;

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

Route::view('/', 'main');
Route::match(['get', 'post'], '/registration', [RegistrationController::class, 'registration']);
Route::match(['get', 'post'], '/authorization', [RegistrationController::class, 'authorization'])->name('login');

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [RegistrationController::class, 'logOut']);
    Route::match(['get', 'post'],'/userpage', [UserPageController::class, 'showUserPage'])->name('userPage');
    Route::get('/newpost', [NewPostController::class, 'showPage']);
    Route::post('/newpost', [NewPostController::class, 'addPost']);
    Route::get('/read/{postID}', [ReadPostController::class, 'index'])->name('readPost');
    Route::get('/edit/{postID}', [EditPostController::class, 'index'])->name('editPost');
    Route::post('/edit/{postID}', [EditPostController::class, 'editPost']);
    Route::any('deletePost/{postID}', [DeletePostController::class, 'index'])->name('deletePost');
});
