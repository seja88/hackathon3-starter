@include('common.html_start')
@if (isset($animal->image->path))
    
<img src="/images/pets/{{$animal->image->path}}" alt="image">
@else 
<img src="/images/pets/random_dog.jpg" alt="image">
@endif




<ul>
    <li>Name:{{$animal->name}}</li>
    <li>Species:{{$animal->species}}</li>
    <li>Breed:{{$animal->breed}}</li>
    <li>Age:{{$animal->age}}</li>
    <li>Weight:{{$animal->weight}}</li>
</ul>

@include('common.html_end')