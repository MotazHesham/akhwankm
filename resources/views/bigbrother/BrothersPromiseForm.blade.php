@extends('layouts.bigbrother')
@section('content')

<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>ااستمارة تعهد وأقرارالمتآخي  </title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>

    <style >
        div.s1 {
        margin: auto;
        position: static;
        height: fit-content;
        margin-top: 50px;
        text-align: right;
        padding: 10px;

        }
		table{
			width: 100%;
		}
		table th{
			font-weight: normal;
		}
		table.padding th{
			padding: .5rem .7rem;
		}
		table.padding td{
			padding: .7rem;
		}
		table.sm-padding td{
			padding: .2rem .7rem;
		}
		.border-bottom td,
		.border-bottom th{
			border-bottom:1px solid #eceff4;
		}
		.text-left{
			text-align:left;
		}
		.text-right{
			text-align:right;
		}


        </style>
</head>
<body style="background-color: rgb(253, 253, 253)">
    <div style="display: flex; justify-content: center;">
    <div  style="width: 21.59cm; height: 30cm ;">

        <a class="btn btn-success" href="{{ route('bigbrother.BrothersPromiseForm.printForm', $bigBrother->id) }}">
            {{ trans('global.print') }}
        </a>
        <img src="{{ URL::to('images/2.jpg') }}" style="width:800px;height:100px;">


    <h1 style=" text-align:center" ><b> <ins> استمارة تعهد وأقرارالمتآخي  </ins></b></h1>

    <h2 style="background-color: #DDD ; text-align:center">  (    ) استمارة رقم</h2>
    <br>
    <br>
<div style="display: flex; justify-content: center;">
    <div style="border: 1px solid #000; width: 20cm;">


        <table style="padding: 1.5rem;float: right;position: relative;">
			<tr>
                <td class="text-right " ><span ></span> <label class="gry-color strong" style="float:right" >&nbsp;اتعهـــد أنا:&nbsp;&nbsp;</label><span >{{$userinfo->name}}</span> </td>
                <td class="text-right " ><span ></span> <label class="gry-color strong" style="float:center" >  رقم الهوية : &nbsp;&nbsp;</label><span >{{$userinfo->identity_number}}</span></td>
				<td class="text-right "  ><span ></span> <label class="gry-color strong selectBoxLabel bold block" style="float:right">  تاريخها : &nbsp;&nbsp;&nbsp;&nbsp;</label> <span >{{$userinfo->identity_date}}</span></td>
							    </tr>


        </table>

		<br>
    <div class="s1">
        <b >بأن: أقرأ وألتزم بجميع الشروط المفروضة عليّ من قِبل الجمعية
            <br>  وألتزم بـ: </b>
        <br>
            <b>
            <ol style="list-style-type:arabic-indic ;direction:RTL; text-align: right;">
               <li>الواجبات المفروضة عليّ من قِبل برنامج التآخي</li>
               <li>أتعامل مع الأخ الأصغر معاملة حسن وبمسؤلية تامة </li>
               <li>التزم بمواعيد المتابعة مع الأخصائي الإجتماعي</li>
               <li>أبلغ الجمعية بأي تغييرات أو طوارئ تحدث في العلاقة مع الأخ الأصغر</li>
               <li> إن اختار الأخ الأخ الأكبر/الأخت اكبرى السيناريو ( 2 ) في سلم التآخي يكون أختلاط الأخ الأصغر/ الأخت الصغرى مع نفس الجنس من أبناء أسرة الأخ الأكبر/ الأخت الكبرى</li>
             </ol>
            </b>
           <p style="text-align: left;font-size:boold"> والله على ما أقول شهيد</p>

           <br>
    </div>
    </div>

</div>

<div style="display: flex; justify-content: center; margin-top:50px;">
<div style="border: 1px solid #000; width: 20cm;">
    <table style="padding: 1.5rem;float: right;position: relative;">
        <tr>

            <td class="text-right " ><span ></span> <label class="gry-color strong" style="float:center" >  الإخصائي الإجتماعي : &nbsp;&nbsp;</label></td>
            <td class="text-right " ><span ></span> <label class="gry-color strong" style="float:right" >   الإسم رباعيا : &nbsp;&nbsp;</label></td>
        </tr>
        <tr>

            <td class="text-right " ><span ></span> <label class="gry-color strong" style="float:center" >    التوقيع :&nbsp;&nbsp;</label></td>
            <td class="text-right " ><span ></span> <label class="gry-color strong" style="float:right" >  التوقيع :   &nbsp;&nbsp;</label></td>
        </tr>
        <tr>

            <td class="text-right " ><span ></span> <label class="gry-color strong" style="float:center" >   بتاريخ : &nbsp;&nbsp;</label></td>
            <td class="text-right " ><span ></span> <label class="gry-color strong" style="float:right" >   التاريخ :  &nbsp;&nbsp;</label></td>
        </tr>




    </table>
 </div>
</div>

<br>
<br>
<br>


        <h4 style="text-align: center">الإخصائي الإجتماعي</h4>
<br>





              <h4 style="text-align: center"> الختم</h4>



              <br>
              <br>
    <img src="{{ URL::to('images/3.jpg') }}" style="width:800px;height:30px;">


</div>
</div>


@endsection



</body>
</html>


