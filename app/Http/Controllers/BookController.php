<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Book;
use App\Models\User;

class BookController extends Controller
{

    public function create(Request $req){
        
        $validated = $req->validate([
            'image' => 'required|mimes:jpeg,png,jpg|max:999',
          
           
        ]);

        $name=$req->name;
        $author=$req->author;
        $no=$req->no;
        $destinationPath='public/images';
        $image=$req->image->getClientOriginalName();
        $path=$req->file('image')->storeAs($destinationPath,$image);

        
        //getClientOriginalExtension() dosya uzantısı alma
        
        
        Book::create([
            "kitap_adi"=>$name,
            "kitap_yazari"=>$author,
            "kitap_resmi"=>$image,
            "kitap_isbn_no"=>$no,

        ]);
        
        $books=Book::all(); 
        return view('books.index',["kitap"=>$books]);
    
  
    }


    public function index()
    {
      $books=Book::all(); 
      $user=User::all();
    
    
    return view("books.index",["kitap"=>$books,"yetki"=>$user]);
    
    }




    public function edit($id)
    {
      $bookEdit=Book::find($id);
      return view("books.update",["bookEdit"=>$bookEdit]);

    }

    public function store(Book $book, Request $request )
    {
       
        $validated = $request->validate([
            'name' => 'max:60',
            'author' => 'max:60',
            'no' => 'max:20',
            'image' => 'max:999',
 
        ]);
        
        $book->update([ 
        "kitap_yazari"=>$request->author,
        "kitap_adi"=>$request->name,
        "kitap_isbn_no"=>$request->no]);

       
           return redirect()->route("books.index");
    }

    public function delete($id)
    {
        Book::where("id",$id)->delete();
        return redirect()->route("books.index");
    }

    
}
