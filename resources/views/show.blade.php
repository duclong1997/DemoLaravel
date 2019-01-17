dung voi template blade:
@isset($name)
    {{$name}}
@endisset

@empty($pass)
{{$pass }}
@endempty

 <!-- get session with key  -->
 <!-- get user name -->
    <br/>
    {{session()->get('text')}}
    <br/>
  {{session()->get('key')}}
  <br/>
{{session()->get('user')}}
<br/>
array with  for 
<br/>
@for($i=0 ; $i < 10 ; $i++)
{{$i}} 
@endfor
<br/>
for each:
<br/>
<?php $hoa= array('v','a','x','a')?>
@foreach($hoa as $value)
{{$value}}
@endforeach
<br/>
 <!-- value for array object in query -->
@if( !empty($vla) )
  
  @foreach ($vla as $value)
  
  {{$value->nameroom.' -'}} and {{$value->gender.' -'}} and {{$value->starttime}}
  
  @endforeach

@endif
<br/>
<img src="img/testimage.jpg" style="height:100px; with:100px"/>


