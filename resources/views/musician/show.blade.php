<div>
    <x-navbar message="welcome from song index" :$musician />
</div>
<h1>{{$musician->name}}</h1>
<ul>
    @forelse($musician->albums as $album)
        <li>{{$album->title}}</li>
    @empty 
        no albums
    @endforelse
</ul>