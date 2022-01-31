{{ Auth::user()->email }}



<form action="logout" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <button type="submit">logout</button>
</form>
