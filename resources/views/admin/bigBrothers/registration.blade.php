@extends('layouts.app')
  @section('styles')

  
  <link rel="stylesheet" href={{asset("css/register-style.css")}}>

  
@endsection

    @section('content')
        

<div class="form_holder">
    <h2 class="fs-title" style="color:#fff;">Registration</h2>
    <form method="Post" enctype="multipart/form-data" id="msform">
      @csrf
      <ul id="progressbar">
        <li class="active">1. Conditions and terms </li>
        <li>2. your Information</li>
        <li>3. Confirmation</li>
      </ul>
      <fieldset>
        <h2 class="fs-title">Accept our Conditions</h2>
        <h3 class="fs-subtitle">This is step 1</h3>
           <input type="button" name="next" class="next action-button" value="Next" />
  </fieldset>
      </fieldset>
      <fieldset>
        @include('admin.bigBrothers.v')
        <input type="button" name="next" class="next action-button" value="Next" />
        
        <input type="button" name="previous" class="previous action-button" value="Previous" />
        
      </fieldset>
      <fieldset>
        <h2 class="fs-title">Suggestions SmallBrothers</h2>
        <h3 class="fs-subtitle">We suggest to you 5 SmallBrother To select one of them</h3>
        
        <input type="button" name="previous" class="previous action-button" value="Previous" />
     
      </fieldset>
    </form>
    </div>
    @endsection

    @section('scripts')

      <script type="text/javascript">

$('#msform').on('submit',function(e){
    e.preventDefault();
    alert('ss');
    let name = $('#name').val();
    let email = $('#email').val();
    let password = $('#password').val();
    let dbo = $('#dbo').val();
    let identity_number = $('#identity_number').val();
    let identity_date = $('#identity_date').val();
    let country = $('#country').val();
    let city = $('#city').val();
    let phone = $('#phone').val();
    let address = $('#address').val();
    let gender = $('#gender').val();
    let marital_status = $('#marital_status').val();
    let degree = $('#degree').val();
    let job_place = $('#job_place').val();
    let salary = $('#salary').val();
    let family_male = $('#family_male').val();
    let family_female = $('#family_female').val();
    let brotherhood_reason = $('#brotherhood_reason').val();
    let charactarstics = $('#charactarstics[]').val();
    let skills = $('#skills[]').val();
    $.ajax({
      url: "{{ route("big-brothers.register")}}",
      type:"Post",
      data:{
        "_token": "{{ csrf_token() }}",
       name :name,
     email :email,
     password:password,
     dbo:dbo,
     identity_number:identity_number,
     identity_date:identity_date,
     country:country,
     city:city,
     phone:phone,
     address:address,
     gender:gender,
     marital_status:marital_status,
     degree:degree,
     job_place:job_place,
     salary:salary,
     family_male:family_male, 
     family_female:family_female, 
     brotherhood_reason:brotherhood_reason, 
     charactarstics:charactarstics,
     skills:skills,
   
      },
      success:function(response){
        console.log(response);
      },
     });
    });
  </script>


    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://www.jqueryscript.net/demo/Creating-A-Modern-Multi-Step-Form-with-jQuery-CSS3/js/jquery.easing.min.js"></script>
<script src={{asset("js/script.js")}}></script>


   
    @endsection
