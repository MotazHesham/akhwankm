@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.outingRequest.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.outing-requests.store") }}" enctype="multipart/form-data">
            @csrf
        <div class="row" >
            <div class="col-md-6">
            <div class="form-group">
                <label class="required" for="outing_type_id">{{ trans('cruds.outingRequest.fields.outing_type') }}</label>
                <select class="form-control select2 {{ $errors->has('outing_type') ? 'is-invalid' : '' }}" name="outing_type_id" id="outing_type_id" required>
                    @foreach($outing_types as $id => $entry)
                        <option value="{{ $id }}" {{ old('outing_type_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('outing_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('outing_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.outingRequest.fields.outing_type_helper') }}</span>
            </div>
            </div>

                <div class="col-md-6">
            <div class="form-group">
                <label class="required" for="place">{{ trans('cruds.outingRequest.fields.place') }}</label>
                <input class="form-control {{ $errors->has('place') ? 'is-invalid' : '' }}" type="text" name="place" id="place" value="{{ old('place', '') }}" required>
                @if($errors->has('place'))
                    <div class="invalid-feedback">
                        {{ $errors->first('place') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.outingRequest.fields.place_helper') }}</span>
            </div>
                </div>
        </div>
        <div class="row" >
            <div class="col-md-6">
            <div class="form-group">
                <label class="required" for="start_date">{{ trans('cruds.outingRequest.fields.start_date') }}</label>
                <input class="form-control datetime {{ $errors->has('start_date') ? 'is-invalid' : '' }}" type="text" name="start_date" id="start_date" value="{{ old('start_date') }}" required>
                @if($errors->has('start_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('start_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.outingRequest.fields.start_date_helper') }}</span>
            </div>
            </div>

                <div class="col-md-6">
            <div class="form-group">
                <label class="required" for="end_date">{{ trans('cruds.outingRequest.fields.end_date') }}</label>
                <input class="form-control datetime {{ $errors->has('end_date') ? 'is-invalid' : '' }}" type="text" name="end_date" id="end_date" value="{{ old('end_date') }}" required>
                @if($errors->has('end_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('end_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.outingRequest.fields.end_date_helper') }}</span>
            </div>
                </div>
        </div>

            <div class="form-group">
                <label for="reason">{{ trans('cruds.outingRequest.fields.reason') }}</label>
                <input class="form-control {{ $errors->has('reason') ? 'is-invalid' : '' }}" type="text" name="reason" id="reason" value="{{ old('reason', '') }}">
                @if($errors->has('reason'))
                    <div class="invalid-feedback">
                        {{ $errors->first('reason') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.outingRequest.fields.reason_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="big_brother_id">{{ trans('cruds.outingRequest.fields.big_brother') }}</label>
                <select class="form-control select2 {{ $errors->has('big_brother') ? 'is-invalid' : '' }}" name="big_brother_id" id="big_brother_id" required>
                    @foreach($big_brothers as $id => $entry)
                        <option value="{{ $id }}" {{ old('big_brother_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('big_brother'))
                    <div class="invalid-feedback">
                        {{ $errors->first('big_brother') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.outingRequest.fields.big_brother_helper') }}</span>
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
