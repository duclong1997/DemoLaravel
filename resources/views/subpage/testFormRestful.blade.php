<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>form here!</h1>
    <br/>
    <form action="{{route('showResouce.store')}}" method="POST">
        @csrf
        name: <input name="name" type="text"/>
        <br/>
        pass: <input name="pass" type="text"/>
        <br/>
        phone: <input name="number" type="number"/>
        <br/>
        <button type="submit" >accept</button>
    </form>
    <br/>

    @yield('testname')
</body>
</html>