<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>view Excel</title>
    <style>
    table, th,td{
        border: 1px black solid;
    }
    table tr th{
        background-color: #40ff00;
    }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th >id</th>
                <th >name room</th>
                <th >value</th>
                <th >start time</th>
                <th >gender</th>
                <th >price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($room as $iteam)
                <tr>
                <td>{{$iteam->id}}</td>
                    <td>{{$iteam->nameroom}}</td>
                    <td>{{$iteam->value}}</td>
                    <td>{{$iteam->starttime}}</td>
                    <td>{{$iteam->gender}}</td>
                    <td>{{$iteam->price}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
<button > <a href="{{route('downloadExcel1')}}" style="text-decoration: none"> download </a></button>
</body>
</html>