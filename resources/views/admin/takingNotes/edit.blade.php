@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.takingNote.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.taking-notes.update", [$takingNote->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required">{{ trans('cruds.takingNote.fields.day') }}</label>
                <select class="form-control {{ $errors->has('day') ? 'is-invalid' : '' }}" name="day" id="day" required>
                    <option value disabled {{ old('day', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\TakingNote::DAY_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('day', $takingNote->day) === (string) $key ? 'selected' : '' }}>{{ trans('global.day.'.$label) }}</option>
                    @endforeach
                </select>
                @if($errors->has('day'))
                    <div class="invalid-feedback">
                        {{ $errors->first('day') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.takingNote.fields.day_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="specialist_name_id">{{ trans('cruds.takingNote.fields.specialist_name') }}</label>
                <select class="form-control select2 {{ $errors->has('specialist_name') ? 'is-invalid' : '' }}" name="specialist_name_id" id="specialist_name_id">
                    @foreach($specialist_names as $id => $entry)
                        <option value="{{ $id }}" {{ (old('specialist_name_id') ? old('specialist_name_id') : $takingNote->specialist_name->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('specialist_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('specialist_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.takingNote.fields.specialist_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="time">{{ trans('cruds.takingNote.fields.time') }}</label>
                <input class="form-control timepicker {{ $errors->has('time') ? 'is-invalid' : '' }}" type="text" name="time" id="time" value="{{ old('time', $takingNote->time) }}" required>
                @if($errors->has('time'))
                    <div class="invalid-feedback">
                        {{ $errors->first('time') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.takingNote.fields.time_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="small_brother_name_id">{{ trans('cruds.takingNote.fields.small_brother_name') }}</label>
                <select class="form-control select2 {{ $errors->has('small_brother_name') ? 'is-invalid' : '' }}" name="small_brother_name_id" id="small_brother_name_id" required>
                    @foreach($small_brother_names as $id => $entry)
                        <option value="{{ $id }}" {{ (old('small_brother_name_id') ? old('small_brother_name_id') : $takingNote->small_brother_name->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('small_brother_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('small_brother_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.takingNote.fields.small_brother_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="behavioral_change">{{ trans('cruds.takingNote.fields.behavioral_change') }}</label>
                <input class="form-control {{ $errors->has('behavioral_change') ? 'is-invalid' : '' }}" type="text" name="behavioral_change" id="behavioral_change" value="{{ old('behavioral_change', $takingNote->behavioral_change) }}" required>
                @if($errors->has('behavioral_change'))
                    <div class="invalid-feedback">
                        {{ $errors->first('behavioral_change') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.takingNote.fields.behavioral_change_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="psychologists_opinions">{{ trans('cruds.takingNote.fields.psychologists_opinions') }}</label>
                <input class="form-control {{ $errors->has('psychologists_opinions') ? 'is-invalid' : '' }}" type="text" name="psychologists_opinions" id="psychologists_opinions" value="{{ old('psychologists_opinions', $takingNote->psychologists_opinions) }}" required>
                @if($errors->has('psychologists_opinions'))
                    <div class="invalid-feedback">
                        {{ $errors->first('psychologists_opinions') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.takingNote.fields.psychologists_opinions_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="social_specialist_opinion">{{ trans('cruds.takingNote.fields.social_specialist_opinion') }}</label>
                <input class="form-control {{ $errors->has('social_specialist_opinion') ? 'is-invalid' : '' }}" type="text" name="social_specialist_opinion" id="social_specialist_opinion" value="{{ old('social_specialist_opinion', $takingNote->social_specialist_opinion) }}" required>
                @if($errors->has('social_specialist_opinion'))
                    <div class="invalid-feedback">
                        {{ $errors->first('social_specialist_opinion') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.takingNote.fields.social_specialist_opinion_helper') }}</span>
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
