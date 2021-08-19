@extends('layouts.app')

@section('content')
<div class="container  ">
    <div class="" style=" background-color: white ; height: 900px; padding: 20px" >
        <div>
            <button style="border-radius:15px; width: 200px; height: 15; background-color: #183273; font-family: cairo" type="submit" class=" form-control  k2  px-3"> التسجيل كأخ أكبر</button>
            <button style="border-radius:15px; width: 192px; height: 48px; background-color: #F6F6F6 ; font-family: cairo ; " type="submit" class="  btn btn-light   k1"> التسجيل كأخ أصغر</button>

        </div>
                    <br><br><br><br>
        <div class="row justify-content-between">
            <div class="col">
            <input type="text" class="form-control text-right " style="   font-family: cairo; background-color: rgb(255, 255, 255)" placeholder="البريد الإلكتروني" required>
            </div>
            <div class="col">
                <input type="text" class="form-control text-right " style="  font-family: cairo;background-color: rgb(255, 255, 255)" placeholder=" اسم المستخدم" required>
            </div>
        </div>
        <div class="row justify-content-between">
            <div class="col">
            <input type="text" class="form-control text-right " style="  height: 70px; font-family: cairo; background-color: rgb(255, 255, 255)" placeholder="إعادة كتابة كلمة السر   " required>
            </div>
            <div class="col">
                <input type="text" class="form-control text-right " style=" height: 70px;  font-family: cairo;background-color: rgb(255, 255, 255)" placeholder="   كلمة السر " required>
            </div>
        </div>
        <div class="row justify-content-between">
            <div class="col">
            <input type="text" class="form-control text-right " style="  height: 70px; font-family: cairo; background-color: rgb(255, 255, 255)" placeholder="رقم الهاتف" required>
            </div>
            <div class="col">
                <input type="text" class="form-control text-right " style=" height: 70px;  font-family: cairo;background-color: rgb(255, 255, 255)" placeholder=" تاريخ الميلاد "  required>
            </div>
        </div>
        <div class="row justify-content-between">
            <div class="col">
            <input type="text" class="form-control text-right " style="  height: 70px; font-family: cairo; background-color: rgb(255, 255, 255)" placeholder=" تاريخ إنتهاء الهوية " required>
            </div>
            <div class="col">
                <input type="text" class="form-control text-right " style=" height: 70px;  font-family: cairo;background-color: rgb(255, 255, 255)" placeholder="رقم الهوية" required>
            </div>
        </div>
        <div class="row justify-content-between">
            <div class="col">
            <input type="text" class="form-control text-right " style="  height: 70px; font-family: cairo; background-color: rgb(255, 255, 255)" placeholder=" المدينة  " required>
            </div>
            <div class="col">
                <input type="text" class="form-control text-right " style=" height: 70px;  font-family: cairo;background-color: rgb(255, 255, 255)" placeholder=" الدولة " required>
            </div>
        </div>
        <div class="row justify-content-between">
            <div class="col">
                 </div>
            <div class="col">
            <input type="text" class="form-control text-right " style="  height: 70px; font-family: cairo; background-color: rgb(255, 255, 255)" placeholder=" العنوان " required>
            </div>

        </div>
        <div class="row justify-content-between">
            <div class="col">
                <input type="text" class="form-control text-right " style="  height: 70px; font-family: cairo; background-color: rgb(255, 255, 255)" placeholder=" العنوان " required>

            </div>
            <div class="col">
            <input type="select" class="form-control text-right " style="  height: 70px; font-family: cairo; background-color: rgb(255, 255, 255)" placeholder=" الدرجة العلمية " required>
            </div>
        </div>

        <div class="row justify-content-between">
            <div class="col">
                <input type="text" class="form-control text-right " style="  height: 70px; font-family: cairo; background-color: rgb(255, 255, 255)" placeholder=" المرتب " required>

            </div>
            <div class="col">
            <input type="text" class="form-control text-right " style="  height: 70px; font-family: cairo; background-color: rgb(255, 255, 255)" placeholder=" المهنة  " required>
            </div>
        </div>

        <div class="row justify-content-between">
            <div class="col">
                <input type="text" class="form-control text-right " style="  height: 70px; font-family: cairo; background-color: rgb(255, 255, 255)" placeholder="  " required>

            </div>
            <div class="col">
            <input type="text" class="form-control text-right " style="  height: 70px; font-family: cairo; background-color: rgb(255, 255, 255)" placeholder=" مكان العمل  " required>
            </div>
        </div>

        <div class="row justify-content-between">
            <div class="col">
                <input type="text" class="form-control text-right " style="  height: 70px; font-family: cairo; background-color: rgb(255, 255, 255)" placeholder=" عدد أفراد الاسرة الذكور " required>

            </div>
            <div class="col">
            <input type="text" class="form-control text-right " style="  height: 70px; font-family: cairo; background-color: rgb(255, 255, 255)" placeholder="  عدد افراد الاسرة الإناث  " required>
            </div>
        </div>





    </div>
</div>
    @endsection
