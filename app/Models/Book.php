<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable=["kitap_adi","kitap_yazari","kitap_resmi","kitap_isbn_no","created_at","updated_at"];
}
