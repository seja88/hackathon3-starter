@include('common.html_start')




<h1>Welcome to our Clinic</h1>

<form action="{{route('owners.search')}}" method="get">

    <label for="search">Search Owner</label><br>
    <input type="text" name="search" id="search">
    <button type="submit">Search</button>

</form>

















@include('common.html_end')

