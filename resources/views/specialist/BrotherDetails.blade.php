

    
@extends('layouts.specialist')

@section('styles') 

  <link rel="stylesheet" href={{asset("css/brother_details.css")}}> 

@endsection

@section('content')
  <div class="container"> 
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-4">
                  <div class="border-bottom text-center pb-4">
                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="profile" class="img-lg rounded-circle mb-3">
                    <div class="mb-3">
                      <h3> {{ $bigBrother->user->name ?? '' }}</h3>
                      <div class="d-flex align-items-center justify-content-center">
                        <h5 class="mb-0 mr-2 text-muted"> {{ $bigBrother->user->city->name ?? '' }}</h5>
                      </div>
                    </div>
                    <p class="w-75 mx-auto mb-3">{{ $bigBrother->job ?? '' }}- {{ $bigBrother->job_place ?? '' }}. </p>
                    
                  </div>
                  <div class="border-bottom py-4">
                    <p>{{ trans('cruds.bigBrother.fields.skills') }}</p>
                    <div>
                        @foreach($bigBrother->skills as $key => $item)
                        <span class="badge badge-info">{{$item->name_en}}</span>
                      @endforeach
        
                    </div>                                                               
                  </div>
                  <div class="border-bottom py-4">
                    <p>
                      {{ trans('cruds.bigBrother.fields.charactarstics') }}</p>
                    @foreach($bigBrother->charactarstics as $key => $item)
                    <span class="badge badge-info">{{$item->name_en}}</span>
                    @endforeach
                  </div>
                  <div class="py-4">
                    <p class="clearfix">
                      <span class="float-left">
                        {{ trans('cruds.user.fields.marital_status') }}
                      </span>
                      <span class="float-right text-muted">
                        {{ $bigBrother->user->marital_status ?? '' }}
                      </span>
                    </p>
                    <p class="clearfix">
                      <span class="float-left">
                        {{ trans('cruds.user.fields.phone') }}
                      </span>
                      <span class="float-right text-muted">
                        {{ $bigBrother->user->phone ?? '' }}
                      </span>
                    </p>
                    <p class="clearfix">
                      <span class="float-left">
                        {{ trans('cruds.user.fields.email') }}
                      </span>
                      <span class="float-right text-muted">
                        {{ $bigBrother->user->email ?? '' }}
                      </span>
                    </p>
                    <p class="clearfix">
                      <span class="float-left">
                        {{ trans('cruds.user.fields.address') }}
                      </span>
                      <span class="float-right text-muted">
                        {{ $bigBrother->user->address ?? '' }}
                      </span>
                    </p>
                    <p class="clearfix">
                      <span class="float-left">
                        
                        {{ trans('cruds.user.fields.degree') }}
                      </span>
                      <span class="float-right text-muted">
                        {{ $bigBrother->user->degree ?? '' }}
                      </span>
                    </p>
                    <p class="clearfix">
                        <span class="float-left">
                          {{ trans('cruds.bigBrother.fields.family_male') }}
                        </span>
                        <span class="float-right text-muted">
                          {{ $bigBrother->family_male ?? '' }}
                        </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-left">
                          {{ trans('cruds.bigBrother.fields.family_female') }}
                        </span>
                        <span class="float-right text-muted">
                          {{ $bigBrother->family_female ??  ''}}
                      </p>
                      
                      <p class="clearfix">
                        <span class="float-left">
                          {{ trans('cruds.user.fields.dbo') }}
                        </span>
                        <span class="float-right text-muted">
                          {{ $bigBrother->user->dbo ??  ''}}
                      </p>
                  </div>
               
                </div>
                <div class="col-lg-8">
                  <link rel="stylesheet" href={{asset("css/steps.css")}}>
                  <div class="content">
                      <div class="container">
                          <div class="row">
                              <!-- end col -->
                          </div>
                          <!-- end row -->
                          <div class="row" >
                    <ul class="nav">
                      <li>
                      <button class="nav-link active btn btn-info" onclick="steps('step1')" style="padding-right:50px;">
                        {{ trans('global.step1') }}
                        @if(1)
                          <i class="far fa-check-circle"></i>
                        @endif
                      </button>
                    </li>
                    <li class="nav-item">
                      <button class="nav-link active btn btn-info" onclick="steps('step2')" style="padding-right:30px;">  {{ trans('global.step2') }}</button>
                    </li>
                    <li class="nav-item">
                      <button class="nav-link active btn btn-info" onclick="steps('step3')" style="padding-right:30px;">{{ trans('global.step3') }}</button>
                    </li> 
                    <li class="nav-item">
                      <button class="nav-link active btn btn-info"   id="4" onclick="steps('step4')"style="padding-right:30px;">{{ trans('global.step4') }}</button>
                    </li>
                    <li class="nav-item">
                      <button class="nav-link active btn btn-info"   id="5" onclick="steps('smallbrother')" style="padding-right:30px;">{{ trans('global.smallbrother') }}</button>
                    </li>
                  </ul>
                </div>
                  
                    <div id="smallbrother" style="display:none">
                
                      @include('specialist.steps.smallbrother')
                    </div>
              
                    <div id="step1" style="display:none">
                      @include('specialist.steps.approvement')
                    </div>
                    <div id="step2" style="display:none">
                    
                      @include('specialist.steps.session')
                    </div>
                    <div id="step3" style="display:none">
                    
                      @include('specialist.steps.brotherhood')
                    </div>
                    <div id="step4" style="display:none">
                    
                      @include('specialist.steps.deal')
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endsection

    @section('scripts')
    <script>
      @if(empty($approve)) 
      

       steps('step1');

 
     @elseif(empty($dating))

       steps('step2');

     @elseif($bigBrother->small_brother_id==null)    

       steps('step3');

          $('#4').css('display','none');
          $('#5').css('display','none');
 

     @elseif(empty($deal))    
  
       steps('step4');
 

     @else
           steps('smallbrother');
     
   @endif
   
      function steps(step){
        if(step == 'smallbrother'){
          $('#smallbrother').css('display','block');

          $('#step1').css('display','none');
          $('#step2').css('display','none');
          $('#step3').css('display','none');
          $('#step4').css('display','none');
        }else if(step == 'step1'){
          $('#step1').css('display','block');

          $('#smallbrother').css('display','none');
          $('#step2').css('display','none');
          $('#step3').css('display','none');
          $('#step4').css('display','none');
        }else if(step == 'step2'){
          $('#step2').css('display','block');

          $('#step1').css('display','none');
          $('#smallbrother').css('display','none');
          $('#step3').css('display','none');
          $('#step4').css('display','none');

         } else if(step == 'step3'){
          $('#step3').css('display','block');

          $('#step1').css('display','none');
          $('#smallbrother').css('display','none');
          $('#step2').css('display','none');
          $('#step4').css('display','none');
         }else if(step == 'step4'){

          $('#step4').css('display','block');
             
          $('#step1').css('display','none');
          $('#smallbrother').css('display','none');
          $('#step2').css('display','none');
          $('#step3').css('display','none');
        }
      }
    </script>
    @endsection