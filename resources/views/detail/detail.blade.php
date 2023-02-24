@include('common.html_start')
<div class="detail">
@if (isset($animal->image->path))
<img src="/images/pets/{{$animal->image->path}}" alt="image" class="pet_image">
@else 
<img src="/images/pets/random_dog.jpg" alt="image" class="pet_image">
@endif



<div class="container_list">
<ul class="detail_list">
    <li class="animal_list">Name: {{$animal->name}}</li>
    <li class="animal_list">Species: {{$animal->species}}</li>
    <li class="animal_list">Breed: {{$animal->breed}}</li>
    <li class="animal_list">Age: {{$animal->age}} years</li>
    <li class="animal_list">Weight: {{$animal->weight}} kg</li>
</ul>
</div>
</div>
@include('common.html_end')