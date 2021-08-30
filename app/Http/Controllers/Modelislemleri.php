<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kitaplarmodel;
use App\Models\Yetkimodel;

class Modelislemleri extends Controller
{

    public function create(Request $req){
        
        $validated = $req->validate([
            'resim' => 'required|mimes:jpeg,png,jpg|max:999',
           
        ]);

        $kitapAdi=$req->kitap_adi;
        $yazar=$req->yazar;
        $isbnNo=$req->isbn_no;
        $destinationPath='public/resimler';
        $resim=$req->resim->getClientOriginalName();
        $path=$req->file('resim')->storeAs($destinationPath,$resim);

        
        //getClientOriginalExtension() dosya uzantısı alma
        
        
        Kitaplarmodel::create([
            "kitap_adi"=>$kitapAdi,
            "kitap_yazari"=>$yazar,
            "kitap_resmi"=>$resim,
            "kitap_isbn_no"=>$isbnNo,

        ]);
        
        $books=Kitaplarmodel::all(); 
        return view('kitaplar',["kitap"=>$books]);
    
  
    }


    public function index()
    {
      $books=Kitaplarmodel::all(); 
      $yetki=Yetkimodel::all();
    
    
    return view("kitaplar",["kitap"=>$books,"yetki"=>$yetki]);
    
    }




    public function edit($id)
    {
      $kitapDuzenle=Kitaplarmodel::find($id);
      return view("kitapduzenle",["kitapduzenle"=>$kitapDuzenle]);

    }

    public function kitapduzenle(Kitaplarmodel $kitap, Request $request )
    {
       
        $validated = $request->validate([
            'kitap_adi' => 'max:60',
            'kitap_yazari' => 'max:60',
            'kitap_isbn_no' => 'max:20',
            'resim' => 'max:999',
 
        ]);
        
        $kitap->update([ 
        "kitap_yazari"=>$request->kitap_yazari,
        "kitap_adi"=>$request->kitap_adi,
        "kitap_isbn_no"=>$request->kitap_isbn_no]);

       
           return redirect()->route("books.index");
    }

    public function sil($id)
    {
        Kitaplarmodel::where("id",$id)->delete();
        return redirect()->route("books.index");
    }

    
}
