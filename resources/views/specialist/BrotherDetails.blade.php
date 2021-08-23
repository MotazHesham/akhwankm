@extends('layouts.specialist')

@section('styles')

    <link rel="stylesheet" href={{ asset('css/brother_details.css') }}>

@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4">
                    <div class="border-bottom text-center pb-4">
                        @if ($bigBrother->user->image)
                            <img src="{{ asset($bigBrother->user->image->getUrl('preview')) }}"
                                class="rounded-circle img-thumbnail">
                        @else
                            <img src="{{ asset('user.png') }}" class="rounded-circle img-thumbnail">
                        @endif
                        <div class="mb-3">
                            <h3> {{ $bigBrother->user->name ?? '' }}</h3>
                            <div class="d-flex align-items-center justify-content-center">
                                <h5 class="mb-0 mr-2 text-muted"> {{ $bigBrother->user->city->name ?? '' }}
                                </h5>
                            </div>
                        </div>
                        <p class="w-75 mx-auto mb-3">{{ $bigBrother->job ?? '' }} <br>
                            {{ $bigBrother->job_place ?? '' }}. </p>

                    </div>
                    @php
                        $name = 'name_' . app()->getLocale();
                    @endphp
                    <div class="border-bottom py-4">
                        <p>{{ trans('cruds.bigBrother.fields.skills') }}</p>
                        <div>
                            @foreach ($bigBrother->skills as $key => $item)
                                <span class="badge badge-info">{{ $item->$name }}</span>
                            @endforeach

                        </div>
                    </div>
                    <div class="border-bottom py-4">
                        <p>
                            {{ trans('cruds.bigBrother.fields.charactarstics') }}</p>
                        @foreach ($bigBrother->charactarstics as $key => $item)
                            <span class="badge badge-info">{{ $item->$name }}</span>
                        @endforeach
                    </div>
                    <div class="py-4">
                        <p class="clearfix">
                            <span class="float-left">
                                {{ trans('cruds.user.fields.marital_status') }}
                            </span>
                            <span class="float-right text-muted">
                                {{ $bigBrother->user->marital_status ? trans('global.marital_status.' . $bigBrother->user->marital_status) : '' }}
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
                                {{ trans('global.degree.' . $bigBrother->user->degree ?? '') }}
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
                                {{ $bigBrother->family_female ?? '' }}
                        </p>

                        <p class="clearfix">
                            <span class="float-left">
                                {{ trans('cruds.user.fields.dbo') }}
                            </span>
                            <span class="float-right text-muted">
                                {{ $bigBrother->user->dbo ?? '' }}
                        </p>
                    </div>

                </div>
                <div class="col-lg-8">
                    <link rel="stylesheet" href={{ asset('css/steps.css') }}>
                    <div class="content">
                        <ul class="nav">
                            <li>
                                <button class="nav-link btn @if ($approvementForm) btn-success @else btn-dark @endif" style=" border:0;border-radius:0"
                                    onclick="steps('step1')">
                                    {{ trans('global.step1') }}
                                    @if ($approvementForm)
                                        <i class="far fa-check-circle"></i>
                                    @endif
                                </button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link btn @if (count($datingSessions) > 0) btn-success @elseif($approvementForm) btn-dark @else btn-light disabled @endif" style="border:0;border-radius:0"
                                    onclick="steps('step2')">
                                    {{ trans('global.step2') }}
                                    @if (count($datingSessions) > 0)
                                        <i class="far fa-check-circle"></i>
                                    @endif
                                </button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link btn @if ($bigBrother->small_brother_id != null) btn-success @elseif(count($datingSessions) > 0) btn-dark @else btn-light disabled @endif" style="border:0;border-radius:0"
                                    onclick="steps('step3')">
                                    {{ trans('global.step3') }}
                                    @if ($bigBrother->small_brother_id != null)
                                        <i class="far fa-check-circle"></i>
                                    @endif
                                </button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link btn @if ($bigBrother->small_brother_id != null) btn-success  @elseif($brotherDealForm) btn-dark  @else btn-light disabled @endif" style="border:0;border-radius:0" id="5"
                                    onclick="steps('smallbrother')">
                                    {{ trans('global.smallbrother') }}
                                    @if ($bigBrother->small_brother_id != null)
                                        <i class="far fa-check-circle"></i>
                                    @endif
                                </button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link btn @if ($brotherDealForm) btn-success @elseif($bigBrother->small_brother_id != null) btn-dark @else btn-light disabled @endif" style="border:0;border-radius:0" id="4"
                                    onclick="steps('step4')">
                                    {{ trans('global.step4') }}
                                    @if ($brotherDealForm)
                                        <i class="far fa-check-circle"></i>
                                    @endif
                                </button>
                            </li>
                        </ul>

                        <div style="padding:20px">
                          <div id="step1" style="display:none">
                              @if ($approvementForm)
                                  <div class="text-center" style="margin-top: 20%">
                                      <h4>
                                          تمت التوصية
                                          <i class="far fa-check-circle"></i>
                                      </h4>
                                      <a href="" class="btn btn-info">طباعة الأستمارة</a>
                                  </div>
                              @else
                                  @include('specialist.steps.approvement')
                              @endif
                          </div>
  
                          <div id="step2" style="display:none">
                            <div class="row">
                              <div class="col-md-7">
                                @include('specialist.steps.session')
                              </div>
                              <div class="col-md-5">
                                <div class="text-center"> 
                                  @if (count($datingSessions) > 0)
                                    <h3>جلسات التعارف</h3>
                                    @foreach($datingSessions as $session)
                                      <div>
                                        <span class="badge badge-warning text-white">تاريخ الجلسة</span>  {{$session->date}}
                                        <br>
                                        <span class="badge badge-info">أخ أصغر</span>  {{$session->small_brother->user->email ?? ''}}
                                      </div>
                                      <hr>
                                    @endforeach
                                  @endif
                                </div>
                              </div>
                            </div>
                          </div>
  
                          <div id="step3" style="display:none"> 
                            @if (isset($small_brothers) && count($small_brothers))
                              @include('specialist.steps.brotherhood')
                            @else
                              <div class="container">
                                <div class="alert alert-warning" style="margin-top: 15%">
                                    {{ trans('cruds.bigBrother.no_suitable') }}
                                </div>
                              </div> 
                            @endif
                          </div>
                          <div id="step4" style="display:none">
                              @if ($brotherDealForm)
                                  <div class="text-center" style="margin-top: 20%">
                                      <h4>
                                          تم التعاقد
                                          <i class="far fa-check-circle"></i>
                                      </h4>
                                      <a href="" class="btn btn-info">طباعة الأستمارة</a>
                                  </div>
                              @else
                                @include('specialist.steps.deal')
                              @endif
                          </div>
                          <div id="smallbrother" class="text-center" style="display:none">
                              @include('specialist.steps.smallbrother')
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
        @if (!$approvementForm)
        
        
            steps('step1');
        
        
        @elseif (count($datingSessions) == 0)
        
            steps('step2');
        
        @elseif($bigBrother->small_brother_id==null)
        
            steps('step3');
        
        @elseif (!$brotherDealForm)
        
            steps('step4');
        
        
        @else
            steps('smallbrother');
        
        @endif

        function steps(step) {
            if (step == 'smallbrother') {
                $('#smallbrother').css('display', 'block');

                $('#step1').css('display', 'none');
                $('#step2').css('display', 'none');
                $('#step3').css('display', 'none');
                $('#step4').css('display', 'none');
            } else if (step == 'step1') {
                $('#step1').css('display', 'block');

                $('#smallbrother').css('display', 'none');
                $('#step2').css('display', 'none');
                $('#step3').css('display', 'none');
                $('#step4').css('display', 'none');
            } else if (step == 'step2') {
                $('#step2').css('display', 'block');

                $('#step1').css('display', 'none');
                $('#smallbrother').css('display', 'none');
                $('#step3').css('display', 'none');
                $('#step4').css('display', 'none');

            } else if (step == 'step3') {
                $('#step3').css('display', 'block');

                $('#step1').css('display', 'none');
                $('#smallbrother').css('display', 'none');
                $('#step2').css('display', 'none');
                $('#step4').css('display', 'none');
            } else if (step == 'step4') {

                $('#step4').css('display', 'block');

                $('#step1').css('display', 'none');
                $('#smallbrother').css('display', 'none');
                $('#step2').css('display', 'none');
                $('#step3').css('display', 'none');
            }
        }
    </script>
@endsection
