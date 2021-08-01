@extends('layouts.app')

@section('styles') 
    <link rel="stylesheet" href={{asset("css/register-style.css")}}> 
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body form_holder">
                    <form method="POST" action="{{route('big-brothers.register')}}" enctype="multipart/form-data" id="msform">
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
                
                        <fieldset>
                            @include('admin.bigBrothers.v')
                            <input type="button" name="next" class="next action-button" value="Next" />
                            
                            <input type="button" name="previous" class="previous action-button" value="Previous" />
                            
                        </fieldset>
                
                        <fieldset>
                            <h2 class="fs-title">Suggestions SmallBrothers</h2>
                            <h3 class="fs-subtitle">We suggest to you 5 SmallBrother To select one of them</h3>
                            
                            <input type="button" name="previous" class="previous action-button" value="Previous" /> 
                            <input type="submit" class="btn btn-success" value="Submit" /> 
                        </fieldset>
                
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

<script type="text/javascript">

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

</script> 

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://www.jqueryscript.net/demo/Creating-A-Modern-Multi-Step-Form-with-jQuery-CSS3/js/jquery.easing.min.js"></script>
<script src={{asset("js/script.js")}}></script> 

@endsection