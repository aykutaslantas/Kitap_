<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
               
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    <li ><b style="font-size:31px; margin-left:-115px">Moneo</b></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                                    <a class="nav-link" href="{{ route('books.index') }}">Kitaplar</a>
                                </li>
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Giriş') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Kayıt Ol') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                            
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<div class="container-fluid">
        <h2 class="mt-4">Kitaplar</h2>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Kitap Listesi</li>
        </ol>
     

        <div class="card mb-4">
        @if(Auth()->check())
            <div class="card-header">
            <a href="{{route('books.create')}}" class="btn btn-primary">Kitap Ekle </a>
            </div>
          @endif
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                           
                                <th>Kitap Adı</th>
                                <th>Kitap Yazarı</th>
                                <th>Kitap Görseli</th>
                                <th>Kitap ISBN Numarası</th>
                                @if(Auth()->check())
                                <th>Düzenle</th>
                                <th>Sil</th>
                                @endif

                            </tr>
                        </thead>

                        <tbody>
                        @foreach($book as $key =>$book)
                           <tr>
                          
                                    <td align="center">{{$book->name}}</td>
                                    <td align="center" >{{$book->author}}</td>
                                    <td align="center"><img style="height:200px; width:200px;"  src="{{ asset('/storage/images/'.$book->image) }}"></td>
                                    <td align="center">{{$book->no}}</td>
                                    @if(Auth()->check())
                                    <td> <a href="{{route('books.edit',['id'=>$book->id])}}" style="text-decoration: none;">Düzenle</a>   </td>
                                    
                                    <td><a href="{{route('books.destroy',['book'=>$book->id])}}" style="text-decoration: none;">Sil</a></td>
                                    @endif
                                  
                                </tr>
               @endforeach
                           

                        </tbody>
                    </table>
                    <div>
              
                    </div>
                </div>
            </div>
        </div>

       
    </div>