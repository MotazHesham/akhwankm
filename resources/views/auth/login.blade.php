@extends('layouts.app')

@section('content')
<div class="container " style="padding:100px 0px 0px 80px; ">

    <div class="login-wrap py-5" style="width: 450px ;height:400px; background-color: white ; border-radius:20px;" >

        <h3 class="text-center mb-0" style="color: #183273;font-family: cairo">جمعية إخوانكم</h3>
        @if(session('message'))
            <div class="alert alert-info" role="alert">
                {{ session('message') }}
            </div>
        @endif

        <form  method="POST" action="{{ route('login') }}" class="login-form">
            @csrf
            <div class="form-group" >
                <div style="float: right;" class="  icon d-flex align-items-center justify-content-center " ><span  style="color: #acacac ; direction:RTL; text-align: right ;float: right;" class="fa fa-envelope"></span></div>
                <input type="email" name="email" class="form-control text-right " style="background-color: rgb(255, 255, 255) ;font-family: cairo;color:black !important" placeholder="البريد الإلكتروني" required>
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <div class="icon d-flex align-items-center justify-content-center"><span  style="color: #acacac" class="fa fa-lock"></span></div>
                <input type="password" name="password" class="form-control text-right" style="background-color: rgb(255, 255, 255) ;color:black !important; font-family: cairo" placeholder="كلمة المرور" required>
                @if($errors->has('password'))
                    <div class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </div>
                @endif
            </div>
            <div class="form-group d-md-flex">
                <div class="w-100 text-md-lift">
                    <a href="#" style="color: #183273;font-family: cairo">نسيت كلمة السر ؟</a>
                </div>
                <div class=" text-md-right">
                    <label style="color: black ; font-family: cairo ; font-size: 13px" for=""> ذكرني</label><br>
                    </div>

                <div class="w-10 text-md-right">
                    <input type="checkbox" id="" name="remember" value="">
                </div>
            </div>
            <div class="form-group " >
                <button style=" color: rgb(255, 255, 255); border-radius:20px; width: 150px; height: 15; background-color: #183273; font-family: cairo" type="submit" class=" form-control  k3  px-3">تسجيل الدخول</button>
            </div>
        </form>
    <br>
    <br>
    <br>
    <div class="form-group d-md-flex " style="float: center">
        <div class="w-25 ">
            <p class="mb-0" style="color: #BEBEBE; font-family: cairo"></p>
        </div>
        <div class=" ">
            <a href="{{ route('big-brothers.register') }}" style="color: #183273; font-family: cairo"> سجل معنا</a>
        </div>
    <div class=" ">
        <p class="mb-0" style="color: #BEBEBE; font-family: cairo">ليس لديك حساب ؟</p>
    </div>


    </div>
  </div>
    </div>
    @endsection
