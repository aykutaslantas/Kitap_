<?php

use App\Http\Controllers\Modelislemleri;
use App\Models\Kitaplarmodel;
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

Route::get('books', function () {
    return view('kitaplar');
})->name("books.index");

Route::get('/', function () {
    return view('home');
})->name("welcome");

Route::get('books/create', function () {
    return view('kitapekle');
})->name("books.create");






Route::get('kitapduzenle', function () {
    return view('kitapduzenle');
})->name("kitapduzenle");

Route::post("/kitapekleform",[App\Http\Controllers\Modelislemleri::class,"create"])->name("kitapekleform");

Route::get("/books",[Modelislemleri::class,"index"])->name("books.index");

Route::post("/kitapduzenleform/{kitap}",[Modelislemleri::class,"kitapduzenle"])->name("kitapduzenleform");

Route::get("/books/edit{id}",[Modelislemleri::class,"edit"])->name("books.edit");

Route::get("/kitapsil{id}",[Modelislemleri::class,"sil"])->name("sil");
/////////////////////////////////////////////////////////////////////
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




