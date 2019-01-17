<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<script src="{{asset('js/jquery.js')}}"></script>
    <script>
        var count=0;

        var count1=0;
        // event scroll for div have  overflow: scroll
        
        // event auto load page when end page
        $(document).ready(function()
	{
        $('#show').scroll(function(event)
        {
            // scroll height : height thực của page
            // height : height của div
            // scroll top: index scroll - top
            // end page - index =10
            if($('#show').scrollTop()+$('#show').height() > $('#show').prop('scrollHeight') -10){
                count=count+1;
                $.get('showAjax1/'+count,function(data){
                    // append: write continue 
                    // html: override 
                    $("#show").append(data);
                });
            }
        });
    });
    
        // event click button
        $(document).ready(function(){
            $("#kick").click(function(){
                // call ajax with parameter and send
                count1=count1+1;
                $.get('showAjax1/'+count1,function(data){
                    // append: write continue 
                    // html: override 
                    $("#show1").append(data);
                });
            });
        });

    </script>
    <title>Document</title>
</head>
<body>
    <b>auto load </b>
     {{-- id test --}}
      {{-- in css -> verflow:scroll : fix size <div> --}}
     <div   id="show" style="height: 200px; width: 100%; float: left; background-color: cadetblue; overflow: scroll;">
            @foreach ($date as $item)
            <div>
                <h1 > {{$item->nametype}} </h1>
             <br/>
        </div>
        @endforeach
     </div>
   <br/>
   <b> click load </b>
   <br/>
    <div   id="show1" >
        @foreach ($date as $item)
        <div>
            <h1 > {{$item->nametype}} </h1>
         <br/>
    </div>
    @endforeach
    </div>

     {{-- id event --}}
     <div style="width: 100%; text-align: center">
        <button id="kick"  >show more</button>
    </div>
    
</body>
</html>