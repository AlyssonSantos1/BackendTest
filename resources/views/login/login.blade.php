@if ($message = Session::get('error'))
    {{$message}}
@endif

<form action="{{ route ('login.form')}}" method="POST">
@csrf

Email: <br> <input type="email" name="email"> <br>
Passord: <br> <input type="password" name="password"> <br>
<button type="submit">Enter</button>

</form>
