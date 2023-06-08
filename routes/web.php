<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebsitesController;
use App\Http\Controllers\BookmarksController;

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

//// BOOKMARKS /////////////////////////////////////////////////
// HOMEPAGE
Route::get('/', [BookmarksController::class, 'index']);
// ADD FORM
Route::get('/bookmarks/add', [BookmarksController::class, 'create'])->middleware('auth');
// ADD
Route::post('/bookmarks', [BookmarksController::class, 'store']);
// EDIT FORM
Route::get('/bookmarks/{bookmark}/edit', [BookmarksController::class, 'edit'])->middleware('auth');
// UPDATE
Route::put('/bookmarks/{bookmark}', [BookmarksController::class, 'update']);
// DELETE
Route::delete('/bookmarks/{bookmark}', [BookmarksController::class, 'destroy'])->middleware('auth');


//// USERS /////////////////////////////////////////////////////
// REGISTER FORM
Route::get('/register', [UserController::class, 'create'])->middleware('guest');
// ADD
Route::post('/users', [UserController::class, 'store']);
// LOGOUT
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');
// LOGIN FORM
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
// AUTH LOGIN
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

//// WEBSITES /////////////////////////////////////////////////
Route::get('/websites', [WebsitesController::class, 'index']);