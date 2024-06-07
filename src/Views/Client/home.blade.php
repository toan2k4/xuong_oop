<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
    <h1>website của {{ $name }}</h1>    
    @if (isset($_SESSION['user']))
         <a href="{{ url('logout') }}">logout</a>
    @else
          <a href="{{ url('login') }}">Login</a>
    @endif
  
   
</body>
</html>