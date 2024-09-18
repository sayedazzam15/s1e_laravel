<h1>{{$musician->name}}</h1>
<ul>
    @forelse($musician->albums as $album)
        <li>{{$album->title}}</li>
    @empty 
        no albums
    @endforelse
</ul>