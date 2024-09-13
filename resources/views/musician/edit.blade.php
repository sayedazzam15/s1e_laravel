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
 
 
 

    <form action="{{route('musician.update',$musician->id)}}" method="post">
        @method('put')
        @csrf
        <div class="row">
        <div class="mb-3 col-6">
          <label for="exampleInputEmail1" class="form-label">Name</label>
          <input type="text" name="name" value="{{$musician->name}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          @error('name')
            <p class="bg-danger">{{ $message }}</p>
          @enderror
        </div>
        <div class="mb-3 col-6">
          <label for="exampleInputPassword1" class="form-label">City</label>
          <input type="text" name="city" value="{{$musician->city}}" class="form-control" id="exampleInputPassword1">
          @error('city')
            <p class="bg-danger">{{ $message }}</p>
          @enderror
        </div>
        <div class="mb-3 col-6">
          <label for="exampleInputPassword1" class="form-label">Steet</label>
          <input type="text" name="street" value="{{$musician->street}}" class="form-control" id="exampleInputPassword1">
          @error('street')
            <p class="bg-danger">{{ $message }}</p>
          @enderror
        </div>
        <div class="mb-3 col-6">
          <label for="exampleInputPassword1" class="form-label">phone</label>
          <input type="text" name="phone" value="{{$musician->phone}}" class="form-control" id="exampleInputPassword1">
          @error('phone')
            <p class="bg-danger">{{ $message }}</p>
          @enderror
        </div>
        <div class="col-3">
            <select class="form-select " name="gender" aria-label="Default select example">
                <option value="male" @if($musician->gender == 'male') selected @endif>male</option>
                <option value="female" @if($musician->gender == 'female') selected @endif>female</option>
            </select>
            @error('gender')
            <p class="bg-danger">{{ $message }}</p>
            @enderror
        </div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

    
</body>
</html>