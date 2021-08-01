<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>استمارة تسجيل اليتيم الراغب في المؤخآة </title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>

    <style >


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
		.small{
			font-size: .85rem;
		}
		.currency{

		}
        </style>
</head>
<body>
    <div style="display: flex; justify-content: center;">
    <div  style="width: 21.59cm; height: 27.94cm ;">

        <img src="{{ URL::to('images/2.jpg') }}" style="width:800px;height:100px;">


    <h1 style=" text-align:center" ><b> <ins>  استمارة تسجيل الأخ الاصغر الراغب في المؤخاه</ins></b></h1>

    <h2 style="background-color: #DDD ; text-align:center">  (    ) استمارة رقم</h2>
    <br>
    <br>
<div style="display: flex; justify-content: center;">
    <div style="border: 1px solid #000; width: 20cm;">


        <table style="padding: 1.5rem;float: right;position: relative;">
			<tr>
				<td class="text-right "  ><span >{{$userinfo->identity_number}}</span> <label class="gry-color strong selectBoxLabel bold block" style="float:right"> : رقم الهوية &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label></td>
				<td class="text-right " ><span >{{$userinfo->name}}</span> <label class="gry-color strong" style="float:right" >: الإسم&nbsp;&nbsp;</label></td>
			</tr>
            <tr>
				<td class="text-right " ><span >{{$userinfo->gender}}</span> <label class="gry-color strong" style="float:right" >: الجنس&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label></td>
			    <td class="text-right " ><span >{{$userinfo->dbo}}</span> <label class="gry-color strong" style="float:right" >: تاريخ الميلاد&nbsp;&nbsp;</label></td>
			</tr>
            <tr>
				<td class="text-right "  ><span >{{$userinfo->phone}}</span> <label class="gry-color strong selectBoxLabel bold block" style="float:right"> : رقم الهاتف/الجوال  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label></td>
				<td class="text-right " ><span >{{$userinfo->degree}}</span> <label class="gry-color strong" style="float:right" >:  المستوى التعليمي&nbsp;&nbsp;</label></td>
			</tr>

        </table>



            <h3><pre>                                                                                  :  صفاتي </pre></h3>

            <div style="display: flex; justify-content: center;">
            <table style="width: 18cm;">
                <tr>
                    <td> 	   العنف والشدة &nbsp; o &nbsp;	</td>
                    <td>	         التواصل &nbsp; o &nbsp;	</td>
                </tr>

                <tr>
                    <td>                      القلق &nbsp; o &nbsp;	</td>
                    <td>	                 الإنصات وحسن الاستماع &nbsp; o	 &nbsp;</td>
                </tr>

                <tr>
                    <td> 	  الثقة بالنفس &nbsp; o &nbsp;	</td>
                    <td>	       ادارة الوقت   &nbsp; o &nbsp;	</td>
                </tr>

                <tr>
                    <td> 	 التردد  &nbsp; o &nbsp;	</td>
                    <td>	    المرونة      &nbsp; o &nbsp;	</td>
                </tr>

                <tr>
                    <td> 	الإنطواء   &nbsp; o &nbsp;	</td>
                    <td>	    العمل الجماعي      &nbsp; o &nbsp;	</td>
                </tr>

                <tr>
                    <td> 	التعايش مع الآخرين   &nbsp; o &nbsp;	</td>
                    <td>	    التفاوض والاقناع      &nbsp; o &nbsp;	</td>
                </tr>

                <tr>
                    <td> 	 معرفة الذات   &nbsp; o &nbsp;	</td>
                    <td>	     التنظيم والترتيب     &nbsp; o &nbsp;	</td>
                </tr>

                <tr>
                    <td> 	 تقدير الذات   &nbsp; o &nbsp;	</td>
                    <td>	       الأفكار السلبية    &nbsp; o &nbsp;	</td>
                </tr>

                <tr>
                    <td> 	 تقبل النصيحة  &nbsp; o &nbsp;	</td>
                    <td>	     التغلب على المخاوف     &nbsp; o &nbsp;	</td>
                </tr>

                <tr>
                    <td> 	 الاقدام   &nbsp; o &nbsp;	</td>
                    <td>	     الإيجابية      &nbsp; o &nbsp;	</td>
                </tr>

                <tr>
                    <td> 	الإندفاعية   &nbsp; o &nbsp;	</td>
                    <td>	     المصداقية     &nbsp; o &nbsp;	</td>
                </tr>

                <tr>
                    <td> 	 حل المشكلات  &nbsp; o &nbsp;	</td>
                    <td>	   تحمل الضغوط       &nbsp; o &nbsp;	</td>
                </tr>



            </table>

            </div>
            <br>
        </div>
    </div>
    <br>













    <img src="{{ URL::to('images/3.jpg') }}" style="width:800px;height:30px;">


</div>
</div>
<script>
    // window.print();
</script>
</body>
</html>
