

<form action="{{route('login')}}" method="post">
@csrf
    username: <input name="user" type="text"/>
    <br/>
    pass: <input name="pass" type="password"/>

    <br/>
    <input type="submit" value="accept"/>
</form>
<br/>

 <!-- check property exist -->
@isset($value) 
{{$value}} is 
@endisset

@isset($check)
 {{$check}}
@endisset

 <!-- call URL of <a> ( getx : name route, $xvalue: value parameter  -->
 <?php 
    $xvalue='long';
    echo 'hello '.$xvalue;
 ?>
 <br/>
  <!-- get link <a> with name route and parameter -->
<a href="{{route('getx',$xvalue) }}"> go login </a>
