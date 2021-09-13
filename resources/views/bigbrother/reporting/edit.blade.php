@extends('layouts.bigbrother')
@section('content')

<div class="card-body">
    <form method="POST" action="{{ route("bigbrother.reportings.update", [$reporting->id]) }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label class="required" for="violation_justifications">{{ trans('cruds.reporting.fields.violation_justifications') }}</label>
            <textarea class="form-control {{ $errors->has('violation_justifications') ? 'is-invalid' : '' }}" name="violation_justifications" id="violation_justifications" required>{{ old('violation_justifications') }}</textarea>
            @if($errors->has('violation_justifications'))
                <div class="invalid-feedback">
                    {{ $errors->first('violation_justifications') }}
                </div>
            @endif
            <span class="help-block">{{ trans('cruds.reporting.fields.violation_justifications_helper') }}</span>
        </div>

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
@endsection