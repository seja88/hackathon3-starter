@include('common.html_start')

<h1>{{ $animal->id ? $animal->name : 'Register new pet' }}</h1>
@if (is_null($animal->id))
    <form action="{{ route('animals.insert', $animal->owner_id) }}" method="post">
    @else
        <form action="{{ route('animals.update', $animal->id) }}" method="post">
            @method('PUT')
@endif
@csrf

<input type="hidden" name="owner_id" value="{{ $animal->owner_id }}">
<label for="name">Enter pet name*: </label><br>
<input type="text" name='name' value="{{ old('name', $animal->name) }}"><br>

<label for="species">Enter species*: </label><br>
<input type="text" name='species' value="{{ old('species', $animal->species) }}"><br>

<label for="breed">Enter breed*: </label><br>
<input type="text" name='breed' value="{{ old('breed', $animal->breed) }}"><br>

<label for="age">Enter age: </label><br>
<input type="number" name='age' value="{{ old('age', $animal->age) }}"> <br>

<label for="weight">Enter weight: </label><br>
<input type="number" name='weight' value="{{ old('weight', $animal->weight) }}"><br><br>

<button type="submit">{{ $animal->id ? 'Update' : 'Add' }}</button>

</form>

@if (isset($animal->id))
    <form action="{{ route('animals.delete', $animal->id) }}" method="post">
        @method('DELETE')
        @csrf
        <button type="submit">Delete</button>
    </form>
@endif

@include('common.html_end')
