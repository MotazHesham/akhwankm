@extends('layouts.app')

@section('styles') 
  <link rel="stylesheet" href={{asset("css/register-style.css")}}> 
@endsection

@section('content')

<div class="form_holder">
    <h2 class="fs-title" style="font-size: 30px">تسجيل الدخول كأخ كبير</h2>
    <form method="Post" enctype="multipart/form-data" id="msform">
      @csrf

        <ul id="progressbar">
          <li class="active">1. قبول الشروط والأحكام </li>
          <li>2. بيانات شخصية</li>
          <li>3. معلومات للمأخاة</li>
          <li>4. اختيار الأخ الأصغر</li>
        </ul>

        <fieldset>
          <h2 class="fs-title">الموافقة علي الشروط والأحكام</h2> 
          <input type="button" name="next" class="next action-button" value="Next" />
        </fieldset> 

        <fieldset>
          @include('auth.partials.account-info')
          <input type="button" name="next" class="action-button" value="Next" id="step-one" />
          
          <input type="button" name="previous" class="previous action-button" value="Previous" />
          
        </fieldset>

        <fieldset> 
          @include('auth.partials.personal-info')
          
          <input type="button" name="next" class="next action-button" value="Next" />
          
          <input type="button" name="previous" class="previous action-button" value="Previous" />  
        </fieldset>

        <fieldset>
          <h2 class="fs-title">Suggestions SmallBrothers</h2>
          <h3 class="fs-subtitle">We suggest to you 5 SmallBrother To select one of them</h3>
          
          <input type="button" name="next" class="next action-button" value="Next" />
          
          <input type="button" name="previous" class="previous action-button" value="Previous" /> 
          <input type="submit" class="btn btn-success" value="Submit" /> 
        </fieldset>

    </form>
</div>

@endsection

@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://www.jqueryscript.net/demo/Creating-A-Modern-Multi-Step-Form-with-jQuery-CSS3/js/jquery.easing.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
<script src={{asset("js/script.js")}}></script> 

<script type="text/javascript">

var current_fs, next_fs, previous_fs; 
var left, opacity, scale; 
var animating; 

  // $('#msform').on('submit',function(e){
  //   e.preventDefault();
  //   alert('ss');
  //   var form_data = $(this).serialize();
  //   $.ajax({
  //     url: "{{ route("big-brothers.register")}}",
  //     type:"Post",
  //     data:form_data,
  //     success:function(response){
  //       console.log(response);
  //     },
  //   });
  // });

  $('#step-one').on('click',function(){
    
    if(animating) return false;
    animating = true;
    
    current_fs = $(this).parent();
    next_fs = $(this).parent().next();
    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
    next_fs.show(); 
    current_fs.animate({opacity: 0}, {
      step: function(now, mx) {
        scale = 1 - (1 - now) * 0.2;
        left = (now * 50)+"%";
        opacity = 1 - now;
        current_fs.css({'transform': 'scale('+scale+')'});
        next_fs.css({'left': left, 'opacity': opacity});
      }, 
      duration: 1000, 
      complete: function(){
        current_fs.hide();
        animating = false;
      }, 
      easing: 'easeInOutBack'
    });
  });
</script> 


@endsection
