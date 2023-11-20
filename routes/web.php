<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\User\GroupController as UserGroupController;
use App\Http\Controllers\Admin\GroupController as AdminGroupController;


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

Route::get('/', function () {
    return view('welcome');
});



Route::resource('/groups', GroupController::class);

Route::resource('/trainers', TrainerController::class);





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::resource('/admin/groups', AdminGroupController::class)->middleware(['auth'])->names('admin.groups');
Route::resource('/user/groups', UserGroupController::class)->middleware(['auth'])->names('user.groups')->only(['index', 'show']);





require __DIR__.'/auth.php';
