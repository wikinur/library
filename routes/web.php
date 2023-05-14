<?php

// use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Auth;
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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\AdminController::class, 'index'])->name('home');
// Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'index']);

// Route::get('/catalogs', [App\Http\Controllers\CatalogController::class, 'index']);
// Route::get('/catalogs/create', [App\Http\Controllers\CatalogController::class, 'create']);
// Route::post('/catalogs', [App\Http\Controllers\CatalogController::class, 'store']);
// Route::get('/catalogs/{catalog}/edit', [App\Http\Controllers\CatalogController::class, 'edit']);
// Route::put('/catalogs/{catalog}', [App\Http\Controllers\CatalogController::class, 'update']);
// Route::delete('/catalogs/{catalog}', [App\Http\Controllers\CatalogController::class, 'destroy']);

Route::resource('/catalogs', CatalogController::class);

Route::resource('/publishers', PublisherController::class);
Route::get('/api/publishers', [PublisherController::class, 'api']);

// Route::get('/authors', [AuthorController::class, 'index']);
Route::resource('/authors', AuthorController::class);
Route::get('/api/authors', [AuthorController::class, 'api']);

Route::resource('/books', BookController::class);
Route::get('/api/books', [BookController::class, 'api']);

Route::resource('/members', MemberController::class);
Route::get('/api/members', [MemberController::class, 'api']);

// Route::get('/transactions', [TransactionController::class, 'index']);
Route::resource('/transactions', TransactionController::class);
Route::get('/api/transactions', [TransactionController::class, 'api']);

// Spatie
Route::get('test_spatie', 'App\Http\Controllers\AdminController@test_spatie');
