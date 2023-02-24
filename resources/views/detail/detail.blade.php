@include('common.html_start')

<img src="/images/pets/{{$animal->image->path}}" alt="image">



<ul>
    <li>Name:{{$animal->name}}</li>
    <li>Species:{{$animal->species}}</li>
    <li>Breed:{{$animal->breed}}</li>
    <li>Age:{{$animal->age}}</li>
    <li>Weight:{{$animal->weight}}</li>
</ul>

@include('common.html_end')