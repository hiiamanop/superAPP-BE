<?php

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MataPelajaranController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Route::resource('users', UserController::class);
Route::resource('roles', RoleController::class);
Route::resource('kelas', KelasController::class);
Route::resource('mata_pelajarans', MataPelajaranController::class);
Route::resource('assignments', AssignmentController::class);
Route::resource('books', BookController::class);
Route::resource('events', EventController::class);
