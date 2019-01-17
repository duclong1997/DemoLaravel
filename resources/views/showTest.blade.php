<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{-- set $pass exist ?? --}}
    @isset($name)
        {{$name }}
        <br/>
    @endisset

    @isset($pass)
        {{$pass}}
        <br/>
    @endisset

    @isset($num)
        {{$num}}
        <br/>
    @endisset
  
    @if (!empty($value))
         {{$value}}
    @endif
</body>
</html>