<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div style="float:left; margin-top:10px">
    <!-- view -> route -->
    <form action="{{route('getdataform2')}}" method="POST" enctype="multipart/form-data">    
        @csrf
      name: <input name="name" type="text">
        <br/>
        pass: <input name="pass" type="text">
        <br/>
        file: <input type="file" name="file" />
        <br/>
        <input type="submit" value="ok">
        <br/>
      {{session()->put('key','hello')}}
    </form>
    </div>
</body>
</html>