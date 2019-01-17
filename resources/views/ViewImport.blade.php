<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Import Execl</title>
</head>
<body>
    <div style="float: left; text-align: left">
        <form action="{{ route('import1') }}" method="POST" enctype="multipart/form-data">
            @csrf
            Import file excel: <input type="file" name="file" class="form-control">
            <br>
            <button class="btn btn-success" style="margin-top: 20px">Import User Data</button>
          
        </form>
    </div>
</body>
</html>