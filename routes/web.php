<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\AvatarController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\UserController;

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


Route::resource('/admin/avatar', AvatarController::class)->middleware(['auth']);
Route::get('/admin/avatar/download/{id}', [AvatarController::class, 'download'])->middleware(['auth'])->name('avatar.download'); 

Route::resource('/admin/image', ImageController::class);
Route::resource('/admin/categorie', CategorieController::class);
Route::resource('/admin/user', UserController::class);



Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

