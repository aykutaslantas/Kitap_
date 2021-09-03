<?php

use App\Http\Controllers\BookController;
use App\Models\Book;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\AssignOp\Mod;

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
    return view('home');
})->name("welcome");

Route::get('books/create', function () {
    return view('books.create');
})->name("books.create");

Route::post("/books",[App\Http\Controllers\BookController::class,"create"])->name("books.store");


Route::get("/books",[BookController::class,"index"])->name("books.index");

Route::put("/books/{book}",[BookController::class,"store"])->name("books.update");

Route::get("/books/{id}/edit",[BookController::class,"edit"])->name("books.edit");

Route::get("/books/{book}",[BookController::class,"destroy"])->name("books.destroy");
/////////////////////////////////////////////////////////////////////
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




