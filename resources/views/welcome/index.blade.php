@include('common.html_start')


<div class="welcome-page">
    <div class="inner_page">
<h1>Welcome to our Clinic</h1>

<form action="{{ route('owners.search') }}" method="get">

    <label for="search">Search Owner</label><br>
    <input type="text" name="search" id="search">
    <button type="submit">Search</button>

</form>
<br><br>
<a href="{{ route('owners.create') }}">Register new owner here</a>
</div>
</div>















@include('common.html_end')
