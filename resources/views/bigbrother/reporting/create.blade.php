@extends('layouts.bigbrother')
@section('content')
   
  @if(isset($reporting))
<div class="card">
    <div class="card-header">
     {{ trans('cruds.reporting.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("bigbrother.reportings.update", [$reporting->id]) }}" enctype="multipart/form-data">
            <div class="container mt-5 mb-3">
                @php
                $name = 'name_' . app()->getLocale();
            @endphp
        
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
                                  
                            </div>
                    </div>
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="violation_justifications">{{ trans('cruds.reporting.fields.violation_justifications') }}</label>
                <textarea class="form-control {{ $errors->has('violation_justifications') ? 'is-invalid' : '' }}" name="violation_justifications" id="violation_justifications" required>{{ old('violation_justifications', $reporting->violation_justifications) }}</textarea>
                @if($errors->has('violation_justifications'))
                    <div class="invalid-feedback">
                        {{ $errors->first('violation_justifications') }}
                    </div>
    @endif
    <span class="help-block">{{ trans('cruds.reporting.fields.violation_justifications_helper') }}</span>
</div>
      
<div class="form-group">
    <button class="btn btn-danger" type="submit">
        {{ trans('global.save') }}
    </button>
</div>
</form>
</div>
</div>
@endif


@endsection
