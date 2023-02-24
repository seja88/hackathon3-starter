@include('common.html_start')
<div class="container">
@foreach ($owners as $owner)
    <h2>Customer name : {{ $owner->first_name }} {{ $owner->surname }}</h2>
<div class="inner">
    <form action="{{ route('owners.edit', $owner->id) }}">
        <button type="submit">Edit</button>
    </form>
    <form action="{{ route('owners.delete', $owner->id) }}" method="post">
        @method('DELETE')
        @csrf
        <button type="submit">Delete</button>
    </form>
    <form action="{{ route('animals.create', $owner->id) }}">
        @csrf
        <button type="submit">Add a new pet</button>
    </form>
</div>
    <ol>
        <h2>Pets:</h2>
        @foreach ($owner->animals as $animal)
            <li><a href="{{ route('animal.detail', $animal->id) }}">{{ $animal->name }}</a></li>
            <form action="{{ route('animals.edit', $animal->id) }}">
                <button type="submit">Edit</button>
            </form>
            <form action="{{ route('animals.delete', $owner->id) }}" method="post">
                @method('DELETE')
                @csrf
                <button type="submit">Delete</button>
            </form>
        @endforeach
    </ol>

</div>
@endforeach

</div>




@include('common.html_end')
