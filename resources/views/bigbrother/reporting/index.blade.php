@extends('layouts.bigbrother')
@section('content')
   
  @if(isset($reportings)&& count($reportings)>0)
<div class="card">
    <div class="card-header">
     {{ trans('cruds.reporting.title_singular') }}
    </div>

    <div class="card-body">
            <div class="container mt-5 mb-3">
                @php
                $name = 'name_' . app()->getLocale();
            @endphp
              @foreach ($reportings as $key => $reporting)
        
                    <div class="card border-danger    mb-3">
                        <div class="card-header ">
                            <div class="row justify-content-between">
                                <div class="col">{{$reporting->date  ?? ''}}</div>
                            </div>
                        </div>
                            <div class="card-body text-danger">
                          
                                <p class="card-text" style="color: black"> <span style="color: rgb(219, 60, 60)">
                                        <br> </span>
                           
                                  <span class="badge badge-info">{{$reporting->report_type->$name ??'' }}</span>
                                  <br>
                                  {{ trans('cruds.reporting.fields.violation_summary') }}:
                                  <span >{{ $reporting->violation_summary ?? '' }}</span>
                                     
                                  
                                    @if($reporting->violation_justifications != null)
                                <br>
                                    {{ trans('cruds.reporting.fields.violation_justifications') }} :
                                    <span >{{ $reporting->violation_justifications ?? '' }}</span>
                                    @else
                                    <div style="padding:30px;">
                                  <a class="btn btn-xs btn-primary" href="{{ route("bigbrother.reportings.edit", [$reporting->id]) }}">
                                    {{ trans('cruds.reporting.fields.violation_justifications') }}
                                </a>
                                
                                  </div>
                                  @endif
                                </div>
                                
                              
</div>
 @endforeach
<div class="row">
    <div class="col">
        {{ $reportings->links() }}
    </div>
</div>

@endif


@endsection
