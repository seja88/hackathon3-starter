@include('common.html_start')

@foreach ($owners as $owner)


<h2>{{$owner->first_name}} {{$owner->surname}}</h2>

<ol>
    
    @foreach ($owner->animals as $animal)
    <li><a href="{{ route('animal.detail', $animal->id)}}">{{$animal->name}}</a></li>

    
    @endforeach
</ol>
    


@endforeach




@include('common.html_end')