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
          left:110px;
          top:20px;
        }
        </style>
</head>

<body style=" background-image: url('{{asset('images/5.jpg')}}');">

<div class="row">
    <div class="col-md-6 ">

        <img  class="k1" src="{{ URL::to('images/9.jpg') }}" style="width:120px;height:120px; padding:0px 0px 0px 0px;">
        <p style=" font: normal normal bold 30px/56px Cairo; color: #183273; padding:310px 0px 0px 433px;">المنصة الإلكترونية</p>
        <p style="font: normal normal  30px/56px Cairo;font-size:61px ; color: #000000; padding:0px 0px 0px 185px;">لمشروع المؤاخاه</p>
    </div>

    <div class="col-md-6">
<div class="container " style="padding:100px 0px 0px 100px; ">

        <div class="login-wrap py-5" style="width: 450px ;height:400px; background-color: white ; border-radius:20px;" >

            <h3 class="text-center mb-0" style="color: #183273;">جمعية إخوانكم</h3>
            <form action="#" class="login-form">
                <div class="form-group" >
                    <div class="  icon d-flex align-items-center justify-content-center" ><span  style="color: #acacac" class="fa fa-envelope"></span></div>
                    <input type="text" class="form-control text-right " style="background-color: rgb(255, 255, 255)" placeholder="البريد الإلكتروني" required>

                </div>
          <div class="form-group">
              <div class="icon d-flex align-items-center justify-content-center"><span  style="color: #acacac" class="fa fa-lock"></span></div>
            <input type="password" class="form-control text-right" style="background-color: rgb(255, 255, 255)" placeholder="كلمة المرور" required>
          </div>
          <div class="form-group d-md-flex">
                          <div class="w-100 text-md-right">
                              <a href="#" style="color: #183273;">نسيت كلمة السر ؟</a>
                          </div>
          </div>
          <div class="form-group " >
              <button style="border-radius:20px; width: 150px; height: 15; background-color: #183273;" type="submit" class=" form-control  k1  px-3">تسجيل الدخول</button>
          </div>
        </form>
        <br>
        <br>
        <br>

        <div class="w-100 text-center mt-4 text">
            <p class="mb-0" style="color: #BEBEBE;">هل لديك حساب ؟</p>
            <a href="#" style="color: #183273;">تسجيل حساب</a>
        </div>
      </div>
        </div>
    </div>
</div>


<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

</body>
</html>
