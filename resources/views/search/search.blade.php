@include('common.html_start')

@foreach ($owners as $owner)
    <h2>{{ $owner->first_name }} {{ $owner->surname }}</h2>

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

    <ol>

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
@endforeach




@include('common.html_end')
