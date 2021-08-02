@extends('layouts.app')

@section('styles') 
  <link rel="stylesheet" href={{asset("css/register-style.css")}}> 
  <style>
    .is-invalid{
      border: 1px solid red !important;
    }
  </style>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
@endsection

@section('content')

<div class="form_holder">
    <h2 class="fs-title" style="font-size: 30px">تسجيل الدخول كأخ كبير</h2>
    <form method="Post" enctype="multipart/form-data" id="msform" action="{{route('big-brothers.register')}}">
      @csrf
        <input type="hidden" name="form_type" value="register">

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
          <div class="alert alert-danger" id="danger-alert2" style="display: none">قم بأدخال الحقول بطريقة صحيحة</div>

          <input type="button" name="previous" class="previous action-button" value="Previous" />
          <input type="button" name="next" class="action-button" value="Next" id="step-two" />
          
        </fieldset>

        <fieldset> 
          @include('auth.partials.personal-info')
          
          <div class="alert alert-danger" id="danger-alert3" style="display: none">قم بأدخال الحقول بطريقة صحيحة</div>
          
          <input type="button" name="previous" class="previous action-button" value="Previous" />  
          <input type="button" name="next" class="  action-button" value="Next" id="step-three"/>
        </fieldset>

        <fieldset>
          <h2 class="fs-title">الأخوة الصغار المقترحين</h2>
          <h3 class="fs-subtitle" id="small_brothers"> </h3>
          <input type="button" name="previous" class="previous action-button" value="Previous" />  
          
          <input type="submit" name="submit" class=" action-button " style="background: #9f27ae" value="Submit" />
          
        </fieldset>

    </form>
</div>

@endsection

@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://www.jqueryscript.net/demo/Creating-A-Modern-Multi-Step-Form-with-jQuery-CSS3/js/jquery.easing.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
<script src={{asset("js/script.js")}}></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>

<script src="{{ asset('js/main.js') }}"></script>

<script type="text/javascript">

  var current_fs, next_fs, previous_fs; 
  var left, opacity, scale; 
  var animating;  

  $('#step-two').on('click',function(){  
    let name = $('#name');
    let email = $('#email');
    let password = $('#password');
    let dbo = $('#dbo');
    let identity_number = $('#identity_number');
    let identity_date = $('#identity_date');
    let country = $('#country');
    let city = $('#city');
    let phone = $('#phone');
    let address = $('#address');
    let gender = $('#gender');
    let job = $('#job');
    let job_place = $('#job_place');
    let salary = $('#salary');
    
    let validated = true;

    if(!email.val()){ 
      validated = false;
      email.addClass('is-invalid');
    }else{ 
      email.removeClass('is-invalid');
    }
    
    if(!password.val()){ 
      validated = false;
      password.addClass('is-invalid');
    }else{ 
      password.removeClass('is-invalid');
    }
    
    if(!name.val()){ 
      validated = false;
      name.addClass('is-invalid');
    }else{ 
      name.removeClass('is-invalid');
    }
    
    if(!dbo.val()){ 
      validated = false;
      dbo.addClass('is-invalid');
    }else{ 
      dbo.removeClass('is-invalid');
    }
    
    if(!phone.val()){ 
      validated = false;
      phone.addClass('is-invalid');
    }else{ 
      phone.removeClass('is-invalid');
    }
    
    if(!identity_number.val()){ 
      validated = false;
      identity_number.addClass('is-invalid');
    }else{ 
      identity_number.removeClass('is-invalid');
    }
    
    if(!identity_date.val()){ 
      validated = false;
      identity_date.addClass('is-invalid');
    }else{ 
      identity_date.removeClass('is-invalid');
    }
    
    if(!gender.val()){ 
      validated = false;
      gender.addClass('is-invalid');
    }else{ 
      gender.removeClass('is-invalid');
    }
    
    if(!address.val()){ 
      validated = false;
      address.addClass('is-invalid');
    }else{ 
      address.removeClass('is-invalid');
    }
    
    if(!city.val()){ 
      validated = false;
      city.addClass('is-invalid');
    }else{ 
      city.removeClass('is-invalid');
    }
    
    if(!country.val()){ 
      validated = false;
      country.addClass('is-invalid');
    }else{ 
      country.removeClass('is-invalid');
    }
    
    if(!job.val()){ 
      validated = false;
      job.addClass('is-invalid');
    }else{ 
      job.removeClass('is-invalid');
    }
    
    if(!job_place.val()){ 
      validated = false;
      job_place.addClass('is-invalid');
    }else{ 
      job_place.removeClass('is-invalid');
    }
    
    if(!salary.val()){ 
      validated = false;
      salary.addClass('is-invalid');
    }else{ 
      salary.removeClass('is-invalid');
    }

    if(validated){
      $('#danger-alert2').css('display','none');
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
    }else{
      $('#danger-alert2').css('display','block');
    }
    
  });

  
  $('#step-three').on('click',function(){  
    
    let family_male = $('#family_male');
    let family_female = $('#family_female');
    let brotherhood_reason = $('#brotherhood_reason'); 
    let cv = $('#cv'); 
    let charactarstics = $('#charactarstics'); 
    let skills = $('#skills'); 

    let validated = true;

    if(!family_male.val()){ 
      validated = false;
      family_male.addClass('is-invalid');
    }else{ 
      family_male.removeClass('is-invalid');
    }

    if(!family_female.val()){ 
      validated = false;
      family_female.addClass('is-invalid');
    }else{ 
      family_female.removeClass('is-invalid');
    }

    if(!brotherhood_reason.val()){ 
      validated = false;
      brotherhood_reason.addClass('is-invalid');
    }else{ 
      brotherhood_reason.removeClass('is-invalid');
    }

    // if(!cv[0].files.length){ 
    //   validated = false;
    //   cv.addClass('is-invalid');
    // }else{ 
    //   cv.removeClass('is-invalid');
    // }

    if(!charactarstics.val()){ 
      validated = false;
      charactarstics.addClass('is-invalid');
    }else{ 
      charactarstics.removeClass('is-invalid');
    }

    if(!skills.val()){ 
      validated = false;
      skills.addClass('is-invalid');
    }else{ 
      skills.removeClass('is-invalid');
    }

    if(validated){
      $('#danger-alert3').css('display','none');

      $.post('{{ route('big-brothers.choose_small_brothers') }}', {_token:'{{ csrf_token() }}', skills:skills.val()}, function(data){
        $('#small_brothers').html('');
        $('#small_brothers').html(data);
      }); 
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
    }else{
      $('#danger-alert3').css('display','block');
    }
  });
</script> 


<script>
  Dropzone.options.cvDropzone = {
  url: '{{ route('admin.users.storeMedia') }}',
  maxFilesize: 2, // MB
  maxFiles: 1,
  addRemoveLinks: true,
  headers: {
    'X-CSRF-TOKEN': "{{ csrf_token() }}"
  },
  params: {
    size: 2
  },
  success: function (file, response) {
    $('form').find('input[name="cv"]').remove()
    $('form').append('<input type="hidden" name="cv" value="' + response.name + '">')
  },
  removedfile: function (file) {
    file.previewElement.remove()
    if (file.status !== 'error') {
      $('form').find('input[name="cv"]').remove()
      this.options.maxFiles = this.options.maxFiles + 1
    }
  },
  init: function () { 
  },
   error: function (file, response) {
       if ($.type(response) === 'string') {
           var message = response //dropzone sends it's own error messages in string
       } else {
           var message = response.errors.file
       }
       file.previewElement.classList.add('dz-error')
       _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
       _results = []
       for (_i = 0, _len = _ref.length; _i < _len; _i++) {
           node = _ref[_i]
           _results.push(node.textContent = message)
       }

       return _results
   }
}
</script>
@endsection
