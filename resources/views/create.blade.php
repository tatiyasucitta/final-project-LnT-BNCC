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
    <div class="navbargue" style="border-bottom: 1px solid grey; padding: 1rem;">
        <ul class="nav nav-pills">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="/">View Product</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="{{route('add')}}">Add Product</a>
            </li>
        </ul>
    </div>
    <p class="bingung"  style= "color:red ; font-weight:bold; margin: 1rem 0rem 1rem 5rem; border-radius:15px; ">
        Create Product Page
    </p>
    <form action= "{{route('added')}}" method="POST" style="margin:0rem 5rem 5rem 5rem;" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <div class="mb-3">
            <label for="formFile" class="form-label">Item Picture</label>
            <input name="image" class="form-control" type="file" id="formFile">
        </div>
          <label>Kategori</label>
          <select name="category_id" class="form-select" aria-label="Default select example">
            <option></option>
            @forelse($cat as $cats)
              <option value="{{$cats->id}}">{{$cats->categoryName}}</option>
            @empty
              <option value="">No category found</option>
              @endforelse
          </select>
          <label for="exampleInputEmail1" class="form-label">Nama Barang</label>
          <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

          <label for="exampleInputEmail1" class="form-label">Harga Barang</label>
          <input type="number" name="harga" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

          <label for="exampleInputEmail1" class="form-label">Jumlah Barang</label>
          <input type="number" name="jumlah" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

        </div>

        {{-- @if ($cat->categoryName->first() == 'Choose') 
          <div class="alert alert-danger" role="alert">
            {{ $errors->'The Kategori field must be choosed' }}
          </div>
        @endif --}}
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
      
</body>
</html>