@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.inequality.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.inequalities.update", [$inequality->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="specialist_id">{{ trans('cruds.inequality.fields.specialist') }}</label>
                <select class="form-control select2 {{ $errors->has('specialist') ? 'is-invalid' : '' }}" name="specialist_id" id="specialist_id" required>
                    @foreach($specialists as $id => $entry)
                        <option value="{{ $id }}" {{ (old('specialist_id') ? old('specialist_id') : $inequality->specialist->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('specialist'))
                    <div class="invalid-feedback">
                        {{ $errors->first('specialist') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.inequality.fields.specialist_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="big_brother_id">{{ trans('cruds.inequality.fields.big_brother') }}</label>
                <select class="form-control select2 {{ $errors->has('big_brother') ? 'is-invalid' : '' }}" name="big_brother_id" id="big_brother_id" required>
                    @foreach($big_brothers as $id => $entry)
                        <option value="{{ $id }}" {{ (old('big_brother_id') ? old('big_brother_id') : $inequality->big_brother->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('big_brother'))
                    <div class="invalid-feedback">
                        {{ $errors->first('big_brother') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.inequality.fields.big_brother_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="small_brother_id">{{ trans('cruds.inequality.fields.small_brother') }}</label>
                <select class="form-control select2 {{ $errors->has('small_brother') ? 'is-invalid' : '' }}" name="small_brother_id" id="small_brother_id" required>
                    @foreach($small_brothers as $id => $entry)
                        <option value="{{ $id }}" {{ (old('small_brother_id') ? old('small_brother_id') : $inequality->small_brother->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('small_brother'))
                    <div class="invalid-feedback">
                        {{ $errors->first('small_brother') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.inequality.fields.small_brother_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="reasons">{{ trans('cruds.inequality.fields.reasons') }}</label>
                <textarea class="form-control {{ $errors->has('reasons') ? 'is-invalid' : '' }}" name="reasons" id="reasons" required>{{ old('reasons', $inequality->reasons) }}</textarea>
                @if($errors->has('reasons'))
                    <div class="invalid-feedback">
                        {{ $errors->first('reasons') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.inequality.fields.reasons_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="date">{{ trans('cruds.inequality.fields.date') }}</label>
                <input class="form-control date {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text" name="date" id="date" value="{{ old('date', $inequality->date) }}" required>
                @if($errors->has('date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.inequality.fields.date_helper') }}</span>
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