@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.datingSession.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.dating-sessions.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-group col-md-4">
                    <label class="required" for="date">{{ trans('cruds.datingSession.fields.date') }}</label>
                    <input class="form-control date {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text" name="date" id="date" value="{{ old('date') }}" required>
                    @if($errors->has('date'))
                        <div class="invalid-feedback">
                            {{ $errors->first('date') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.datingSession.fields.date_helper') }}</span>
                </div>
                <div class="form-group col-md-4">
                    <label class="required" for="big_brother_id">{{ trans('cruds.datingSession.fields.big_brother') }}</label>
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
                    <span class="help-block">{{ trans('cruds.datingSession.fields.big_brother_helper') }}</span>
                </div>
                <div class="form-group col-md-4">
                    <label for="small_brother_id">{{ trans('cruds.brothersDealForm.fields.small_brother') }}</label>
                    <select class="form-control select2 {{ $errors->has('small_brother') ? 'is-invalid' : '' }}" name="small_brother_id" id="small_brother_id"  >
                        @foreach($small_brothers as $id => $entry)
                            <option value="{{ $id }}" {{ old('small_brother_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('small_brother'))
                        <div class="invalid-feedback">
                            {{ $errors->first('small_brother') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.brothersDealForm.fields.small_brother_helper') }}</span>
                </div> 
                <div class="form-group col-md-6">
                    <label class="required" for="interview_notes">{{ trans('cruds.datingSession.fields.interview_notes') }}</label>
                    <textarea class="form-control {{ $errors->has('interview_notes') ? 'is-invalid' : '' }}" name="interview_notes" id="interview_notes" required>{{ old('interview_notes') }}</textarea>
                    @if($errors->has('interview_notes'))
                        <div class="invalid-feedback">
                            {{ $errors->first('interview_notes') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.datingSession.fields.interview_notes_helper') }}</span>
                </div>
                <div class="form-group col-md-6">
                    <label class="required" for="recommendations">{{ trans('cruds.datingSession.fields.recommendations') }}</label>
                    <textarea class="form-control {{ $errors->has('recommendations') ? 'is-invalid' : '' }}" name="recommendations" id="recommendations" required>{{ old('recommendations') }}</textarea>
                    @if($errors->has('recommendations'))
                        <div class="invalid-feedback">
                            {{ $errors->first('recommendations') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.datingSession.fields.recommendations_helper') }}</span>
                </div> 
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