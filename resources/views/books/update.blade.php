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

<form method="POST" action="{{ route('books.update', ['book' => $bookEdit->id]) }}"  enctype="multipart/form-data">
@csrf
@method('PUT')
    <div class="genel">

  <div class="mb-1">
  <input type="hidden" name="id" value="{{$bookEdit->id}}">
    <label  class="form-label">Kitap Adı</label>
    <input type="text" name="name" class="form-control" value="{{old('name',$bookEdit->kitap_adi)}}"  >
    
  </div>
  <div class="mb-1">
    <label class="form-label">Yazar</label>
    <input type="text" name="author" class="form-control" value="{{old('author',$bookEdit->kitap_yazari)}}"  >
    
  </div>

  <div class="mb-1">
    <label  class="form-label">Kapak Görseli</label>
    <img style="height:200px; width:200px;"  src="{{ asset('/storage/images/'.$bookEdit->kitap_resmi) }}">
    
  </div>
  <div class="mb-1">
    <label  class="form-label">ISBN Numarası</label>
    <input type="text" name="no" class="form-control" value="{{old('no',$bookEdit->kitap_isbn_no)}}" >
    
  </div>

<br>
  <button type="submit" class="btn btn-primary">Kitap Düzenle</button>

</form>
<br> <br> <br>
<a href="{{route('books.index')}}" class="btn btn-danger">Kitaplara Dön</a>


</div>