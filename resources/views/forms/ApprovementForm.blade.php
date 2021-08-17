<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>استمارة التوصية بالمؤاخاة </title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>

    <style >
   div.s1 {
    margin: auto;
    position: static;
    border: 1.5px solid black;
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


    <h1 style=" text-align:center" ><b> <ins> استمارة التوصية بالمؤاخاة  </ins></b></h1>

    <h2 style="background-color: #DDD ; text-align:center">  (  {{$approvementForms->id}} ) استمارة رقم</h2>
    <br>
    <br>


    <div style="display: flex; justify-content: center;">
        <div style="border: 1px solid #000; width: 20cm;">
    
    
            <table style="padding: 1.5rem;float: right;position: relative;">
                <div style="text-align: right; padding:10px;">
                    <b> 
                       
                       
                          توصية الأخصائية الإجتماعية :  &nbsp; &nbsp;
                          {{$approvementForms->description}} 
                        
                 <br>
               
                  قرار اللجنة العليا للجمعية : &nbsp; &nbsp;
                  {{$approvementForms->descision}} 
              
                <br>
                @if($approvementForms->approved =='approved') 
               
                <label class="gry-color strong" style="float:right" > (<input name="intern_extern" type="checkbox"  checked>)   :  الموافقة 
                  <br>
                    <label class="gry-color strong" style="float:right" > (<input name="intern_extern" type="checkbox"  >)   :   عدم الموافقة   
             @else
             <label class="gry-color strong" style="float:right" > (<input name="intern_extern" type="checkbox"  >)   :  الموافقة
             <br>
                <label class="gry-color strong" style="float:right" > (<input name="intern_extern" type="checkbox" checked >)   :   عدم الموافقة  
                
                </label>
                @endif
            <br>
            
                   السبب : &nbsp;
                  {{$approvementForms->reason}} 
   
                    </b>
              

                </div>
            
             
            </table>
    
            <br>

        </div>
    </div>

<div style="display: flex; justify-content: center; margin-top:50px;">

    <div style="border: 1px solid #000; width: 20cm;">


        <table style="padding: 1.5rem;float: right;position: relative;">
			<tr>
				<td class="text-right "  ><span ><span> <label class="gry-color strong selectBoxLabel bold block" style="float:right">   مدير اللجنة                                                 الأخصائية الإجتماعية &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label></td>
				<td class="text-right " ><span ></span> <label class="gry-color strong" style="float:right" > مدير اللجنة&nbsp;&nbsp;</label></td>
			</tr>
            <tr>
				<td class="text-right "  ><span ></span> <label class="gry-color strong selectBoxLabel bold block" style="float:right"> :   التوقيع  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label></td>
				<td class="text-right " ><span ></span> <label class="gry-color strong" style="float:right" >: التوقيع &nbsp;&nbsp;</label></td>
			</tr>
            <tr>
				<td class="text-right "  ><span ></span> <label class="gry-color strong selectBoxLabel bold block" style="float:right"> :   التاريخ  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label></td>
				<td class="text-right " ><span ></span> <label class="gry-color strong" style="float:right" >: التاريخ &nbsp;&nbsp;</label></td>
			</tr>
            <tr>
				<td class="text-center "  ><span ></span> <label class="gry-color strong selectBoxLabel bold block" style="float:center"> :   الختم  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label></td>
				
			</tr>
        </table>
  
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
