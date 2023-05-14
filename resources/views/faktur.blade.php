<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/view.css') }} ">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('Home', 'Home') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
                    <div class="navbargue" style="border-bottom: 1px solid grey; padding: 1rem;">
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                              <a class="nav-link" href="{{route('faktur')}}">Facture</a>
                            </li>
                        </ul>
                    </div>

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <form action= "{{route('createfaktur')}}" method="POST" style="margin:0rem 5rem 5rem 5rem;" enctype="multipart/form-data">
        @csrf
        <br>
        <h3>Invoice : {{$invoice}}</h3>
        <br>
        <div class="mb-3">
          {{-- <label for="exampleInputEmail1" name="invoice" class="form-label">Invoice : {{$invoice}}</label><br> --}}
          <label for="exampleInputEmail1" class="form-label">Alamat</label>
          <input type="text" name="address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

          <label for="exampleInputEmail1" class="form-label">kode pos</label>
          <input type="number" name="postal" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

        </div>
        
        @if ($errors->any())
        <li class="alert alert-danger" role="alert">
            {{ $errors->first() }}
        </li>
        @endif
        @if(session()->has('success'))
        <p class="alert alert-success"> {{ session()->get('success') }}</p>
        @endif
        <button type="submit" class="btn btn-primary" value= "submit">Submit</button>
    </form>
    
    <br>
    {{-- <p>The size of the array is {{ $items }}.</p> --}}

    {{-- echo count($items); --}}
    <h3>Cart's item</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Nama</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
            </tr>
        </thead>
    @foreach ($items as $cart)
    {{-- @if(isset($item)) --}}
        <tbody>
          <tr>
            <th scope="row"></th>
            <td>{{$cart->itemName}}</td>
            <td>{{$cart->harga}}</td>
            <td><input type="number" value="{{$cart->quantity}}" min="1" name="quantity" class="text-sm sm:text-base px-2 pr-2 rounded-lg border border-gray-400 py-1 focus:outline-none focus:border-blue-400" style="width: 50px"/></td>
          </tr>
        </tbody>
      </table>
      {{-- @endif --}}
    @endforeach
</body>
</html>