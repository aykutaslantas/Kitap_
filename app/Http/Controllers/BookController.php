<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Http\Requests\StoreBookRequest;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;

class BookController extends Controller
{
    public function create(StoreBookRequest $req)
    {
        $validated = $req->validated();
        $validated = $req->safe()->only(['name', 'author','isbnNo','image','id']);

        $destinationPath = 'public/images';
        $image = $req->image->getClientOriginalName();
        $path = $req->file('image')->storeAs($destinationPath, $image);

        //getClientOriginalExtension() dosya uzantısı alma

        Book::create([
            'name' => $req->name,
            'author' => $req->author,
            'image' => $image,
            'isbnNo' => $req->isbnNo,
        ]);
        
        $books = Book::all();

        return view('books.index', ['book' => $books]);
    }

    public function index()
    {
        $books = Book::all();
        $user = User::all();

        return view('books.index', ['book' => $books, 'yetki' => $user]);
    }

    public function edit(Book $book)
    {
        $bookEdit = Book::find($book->id);

        return view('books.update', ['bookEdit' => $bookEdit]);
    }

    public function store(StoreBookRequest $req, Book $book)
    {
        $validated = $req->validated();
        $validated = $req->safe()->only(['name', 'author','isbnNo','image','id']);
        $book->update([
        'author' => $req->author,
        'name' => $req->name,
        'isbnNo' => $req->isbnNo, ]);

        return redirect()->route('books.index');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index');
    }
}
