<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>test Restful</title>
</head>
<body>
    @include('subpage/menu')
    <br/>
    Hello Long!
    @include('subpage/testFormRestful')
    
    <br/>
    <?php 
        $name='12';
    ?>
<a href="{{route('showResouce.show',$name) }}"> show with Resoure in laravel </a>

</body>
</html>