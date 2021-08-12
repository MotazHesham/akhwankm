@extends('layouts.smallbrother')

@section('styles') 
  <link rel="stylesheet" href={{asset("css/profile-style.css")}}> 
  
  @endsection

@section('content')
<div class="container">
    <div class="main-body">
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src={{asset("images/brotherhood.jpg")}}  class="rounded-circle" width="360">
                    <div class="mt-3">
                        @foreach($bigBrother as $key => $bigBrother)
                      <h4> {{ $bigBrother->user->name ?? '' }}</h4>
                      <p class="text-secondary mb-1"> {{ $bigBrother->job ?? '' }}</p>
                      <p class="text-muted font-size-sm">{{ $bigBrother->job_place ?? '' }} </p> 
                    </div>
                  
                  </div>
                </div>
              </div>
              <div class="card mt-3">
               
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">
                        {{ trans('cruds.user.user_type.big_brother') }}</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $bigBrother->user->name ?? '' }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0"> {{ trans('cruds.user.fields.email') }}</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $bigBrother->user->email ?? '' }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0"> {{ trans('cruds.user.fields.phone') }}</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $bigBrother->user->phone ?? '' }}
                    </div>
                  </div>
                  <hr>
                  
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">{{ trans('cruds.user.fields.address') }}</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $bigBrother->user->address ?? '' }}
                    </div>
                  </div>
                </div>
              </div>

              <div class="row gutters-sm">
                <div class="col-sm-6 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">    {{ trans('cruds.smallBrother.fields.skills') }}</i></h6>
                      @foreach($bigBrother->skills as $key => $item)
                       
                      <small>{{ $item->name_ar }}</small>
                    
                      @endforeach
             
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">{{ trans('cruds.smallBrother.fields.charactaristics') }}</i> </h6>
                      @foreach($bigBrother->charactarstics as $key => $item)
                   
                      <small>{{ $item->name_ar }}</small>
                 
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>



            </div>
          </div>

        </div>
    </div>
    @endforeach
@endsection