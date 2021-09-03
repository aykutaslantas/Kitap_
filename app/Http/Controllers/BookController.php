<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function create(Request $req)
    {
        $validated = $req->validate([
            'image' => 'required|mimes:jpeg,png,jpg|max:999',
        ]);

        $name = $req->name;
        $author = $req->author;
        $no = $req->no;
        $destinationPath = 'public/images';
        $image = $req->image->getClientOriginalName();
        $path = $req->file('image')->storeAs($destinationPath, $image);

        //getClientOriginalExtension() dosya uzantısı alma

        Book::create([
            'name' => $name,
            'author' => $author,
            'image' => $image,
            'no' => $no,
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

    public function edit($id)
    {
        $bookEdit = Book::find($id);

        return view('books.update', ['bookEdit' => $bookEdit]);
    }

    public function store(Book $book, Request $request)
    {
        $validated = $request->validate([
            'name' => 'max:60',
            'author' => 'max:60',
            'no' => 'max:20',
            'image' => 'max:999',
        ]);

        $book->update([
        'author' => $request->author,
        'name' => $request->name,
        'no' => $request->no, ]);

        return redirect()->route('books.index');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index');
    }
}
