<h1>{{$song->title}}</h1>
<h3>{{$song->album->title}}</h3>

<ul>
    @foreach($song->musicians as $musician)
        <li>{{$musician->name}}</li>
    @endforeach
</ul>
