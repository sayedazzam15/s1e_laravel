
    <x-layout >
        <x-slot:title>
            Musician Page
        </x-slot>
        <form action="{{ route('musician.create')}}">
            <button class="btn btn-primary">create</button>
        </form>
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>slug</th>
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
                        <td>{{ $musician->slug }}</td>
                        <td>{{ $musician->city }}</td>
                        <td>{{ $musician->street }}</td>
                        <td>{{ $musician->phone }}</td>
                        <td>{{ $musician->gender }}</td>
                        <td>{{ $musician->top_producer }}</td>
                        <td>
                            <a href="{{route('musician.show',$musician)}}" class="btn btn-primary">show</a>
                            <form action="{{ route('musician.edit',$musician)}}">
                                <button class="btn btn-warning">edit</button>
                            </form>
                            <form action="{{ route('musician.destroy',$musician)}}" method="post">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger">delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
    
            </tbody>
        </table>
    </x-layout>
    {{$musicians->links()}}
