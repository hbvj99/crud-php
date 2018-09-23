<!--
Created by PhpStorm.
User: vijay
Date: 9/20/2018
Time: 11:09 AM
-->
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customer Management CRUD System</title>
    <h1 style="color: #ffffff;text-align: center;background: #1b6d85;padding: 10px;font-family: Verdana;">CURD Application</h1>
    <link rel="stylesheet" href="{{url('lib/bootstrap/css/bootstrap.css')}}">
</head>
<body style="background: #fcfcfc">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="http://127.0.0.1:8000/"><h2 style="color: #1b6d85"><i class="glyphicon glyphicon-user"></i> Customer Management System</h2></a>         <hr>
        </div>
    </div>
</div>
@yield('content')
</body>
</html>