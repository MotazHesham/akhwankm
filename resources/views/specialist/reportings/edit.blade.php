@extends('layouts.specialist')
@section('content')

<div class="card">
    <div class="card-header">
     {{ trans('cruds.reporting.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("specialist.reportings.update", [$reporting->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="committees_decision">{{ trans('cruds.reporting.fields.committees_decision') }}</label>
                <textarea class="form-control {{ $errors->has('committees_decision') ? 'is-invalid' : '' }}" name="committees_decision" id="committees_decision" required>{{ old('committees_decision', $reporting->committees_decision) }}</textarea>
                @if($errors->has('committees_decision'))
                    <div class="invalid-feedback">
                        {{ $errors->first('committees_decision') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.reporting.fields.committees_decision_helper') }}</span>
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