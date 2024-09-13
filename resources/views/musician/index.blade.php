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
    <form action="{{ route('musician.create')}}">
        <button class="btn btn-primary">create</button>
    </form>
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>city</th>
                <th>street</th>
                <th>phone</th>
                <th>gender</th>
                <th>top_producer</th>
                <th>actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($musicians as $musician)
                <tr>
                    <td>{{ $musician->id }}</td>
                    <td>{{ $musician->name }}</td>
                    <td>{{ $musician->city }}</td>
                    <td>{{ $musician->street }}</td>
                    <td>{{ $musician->phone }}</td>
                    <td>{{ $musician->gender }}</td>
                    <td>{{ $musician->top_producer }}</td>
                    <td>
                        <form action="{{ route('musician.show',$musician->id)}}">
                            <button>edit</button>
                        </form>
                        <form action="{{ route('musician.destroy',$musician->id)}}" method="post">
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
    {{$musicians->links()}}
</body>
</html>