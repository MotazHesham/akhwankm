<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>

    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>


    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('css/stylee.css') }}">

    <script src='main.js'></script>

    <title>Document</title>

    <style>
        img.k1 {
          position: absolute;
          left:300px;
          top: 100px;
        }

        button.k1 {
          position: absolute;
          left:167px;
          top:20px;
          z-index: 1;
        }

        button.k2 {
          position: absolute;
          left:350px;
          top:20px;
            z-index: 2;
        }

        button.k3 {
          position: absolute;
          left:110px;
          top:20px;
        }


        </style>
</head>

<body style=" width: 1330px; background-image: url('{{asset('images/5.jpg')}}')">

<div class="row">
    <div class="col-md-6 ">

        <img  class="k1" src="{{ URL::to('images/9.jpg') }}" style="width:120px;height:120px; padding:0px 0px 0px 0px;">
        <p style=" font: normal normal bold 30px/56px Cairo; color: #183273; padding:310px 0px 0px 400px;">المنصة الإلكترونية</p>
        <p style="font: normal normal  30px/56px Cairo;font-size:51px ; color: #000000; padding:0px 0px 0px 185px;">لمشروع المؤاخاه</p>
    </div>

    <div class="col-md-6">
        @yield('content')
    </div>
</div>


<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

</body>
</html>
