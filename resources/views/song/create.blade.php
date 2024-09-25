<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Document</title>
</head>
<body>
 
 
 

    <form action="{{ route('song.store')}}" method="post">
        <div class="row">
        <div class="mb-3 col-6">
          <label for="exampleInputEmail1" class="form-label">Title</label>
          <input type="text" name="title" class="form-control" value="{{old('title')}}" id="exampleInputEmail1" aria-describedby="emailHelp">
          @error('title')
            <p class="bg-danger">{{ $message }}</p>
          @enderror
        </div>
        <div class="mb-3 col-6">
          <label for="exampleInputPassword1" class="form-label">Author</label>
          <input type="text" name="author" class="form-control" value="{{old('author')}}" id="exampleInputPassword1">
          @error('author')
            <p class="bg-danger">{{ $message }}</p>
          @enderror
        </div>

        <div class="col-3">
            <select class="form-select " name="album_id" aria-label="Default select example">
                <option value="" selected>none</option>
                @foreach($albums as $album)
                  <option value="{{$album->id}}" {{old('album_id') == $album->id ? 'selected' : ''}}>{{$album->title}}</option>
                @endforeach
            </select>
            @error('genalbumder')
            <p class="bg-danger">{{ $message }}</p>
            @enderror
        </div>



         <div class="col-3">
            <select class="form-select " multiple name="musicians[]" aria-label="Default select example">
                @foreach($musicians as $musician)
                  <option value="{{$musician->id}}" {{ in_array($musician->id,old('musicians') ?? []) ? 'selected' : ''}}>{{$musician->slug}}</option>
                @endforeach
            </select>
            @error('genalbumder')
            <p class="bg-danger">{{ $message }}</p>
            @enderror
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

    
</body>
</html>