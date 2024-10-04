<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
    <style>
        .gray{
            background: gray
        }
    </style>
</head>
<body>
    <form action="{{ route('song.create')}}">
        <button class="btn btn-primary">create</button>
    </form>
    <table class="table">
        <thead>
            <tr>
                <th>id</th>
                <th>title</th>
                <th>author</th>
                <th>album_title</th>
            </tr>
        </thead>
        <tbody>
            {{-- query return songs --}}
            {{-- lazy loading --}}
            @foreach($songs as $song)
                <tr>
                    <td>{{ $song->id }}</td>
                    <td>{{ $song->title }}</td>
                    <td>{{ $song->author }}</td>
                    <td>{{ $song->album?->title }}</td>
                    <td>

                            <a href="{{route('song.show',$song)}}">Show</a>
                            @can('song.update')
                                <form action="{{ route('song.edit',$song)}}">
                                    <button>edit</button>
                                </form>
                            @endcan

                                <form action="{{ route('song.destroy',$song)}}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button>delete</button>
                                </form> 


                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js" integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{$songs->links()}}
</body>
</html>