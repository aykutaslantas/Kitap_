<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .genel{width: 300px;
        margin-left: 10px;}
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    
</body>
</html>
@if ($errors->any())
<div class="alert alert-danger" role="alert" style="width: 69%;">
@foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
</div>
@endif
<form method="POST" action="{{route('books.store')}}" enctype="multipart/form-data">
@csrf
    <div class="genel">
    
  <div class="mb-1">
   
    <label  class="form-label">Kitap Adı</label>
    <input name="name" type="text" class="form-control" required value="{{old('name')}}">
    
  </div>
  <div class="mb-1">
    <label class="form-label">Yazar</label>
    <input name="author" type="text" class="form-control" required value="{{old('author')}}" >
    
  </div>

  <div class="mb-1">
    <label  class="form-label">Kapak Görseli</label>
    <input name="image" type="file" class="form-control" required >
    
  </div>
  <div class="mb-1">
    <label  class="form-label">ISBN Numarası</label>
    <input type="text" name="isbnNo" class="form-control" required value="{{old('isbnNo')}}">
    
  </div>

<br>
  <button type="submit" class="btn btn-primary">Kitap Ekle</button>

</form>
<br> <br> <br>
<a href="{{route('books.index')}}" class="btn btn-danger" >Kitaplara Dön</a>



</div>