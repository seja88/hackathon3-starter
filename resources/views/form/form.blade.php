@include('common.html_start')

<h1>{{ $owner->id ? 'Update the form' : 'Register' }} here</h1>

@if (is_null($owner->id))
    <form action="{{ route('owners.insert') }}" method="post">
    @else
        <form action="{{ route('owners.update', $owner->id) }}" method="post">
            @method('PUT')
@endif


@csrf
<label for="first_name">Enter first name*: </label><br>
<input type="text" name='first_name' value="{{ old('first_name', $owner->first_name) }}"><br>
<label for="surname">Enter surname*: </label><br>
<input type="text" name='surname' value="{{ old('surname', $owner->surname) }}"><br>
<label for="email">Enter email*: </label><br>
<input type="text" name='email' value="{{ old('email', $owner->email) }}"><br>
<label for="phone">Enter phone number: </label><br>
<input type="text" name='phone' value="{{ old('phone', $owner->phone) }}"> <br>
<label for="address">Enter address: </label><br>
<input type="text" name='address' value="{{ old('address', $owner->address) }}"><br><br>

<button type="submit">{{ $owner->id ? 'Update' : 'Register' }}</button>

</form>
@if (isset($owner->id))
<form action="{{route('owners.delete', $owner->id)}}" method="post">
    @method('DELETE')
    @csrf
    <button type="submit">Delete</button>
</form>
@endif



@include('common.html_end')
