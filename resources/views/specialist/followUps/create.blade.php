@extends('layouts.specialist')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.followUp.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("specialist.follow-ups.store") }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="specialist_id" value="{{Auth::id()}}">
            <input type="hidden" name="small_brother_id" value="{{$small_brother->id}}">
         
            <div class="form-group">
                <label class="required">{{ trans('cruds.followUp.fields.deal') }}</label>
                @foreach(App\Models\FollowUp::DEAL_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('deal') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="deal_{{ $key }}" name="deal" value="{{ $key }}" {{ old('deal', '') === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="deal_{{ $key }}">{{ trans('cruds.followUp.deal.'.$label) }}</label>
                    </div>
                @endforeach
                @if($errors->has('deal'))
                    <div class="invalid-feedback">
                        {{ $errors->first('deal') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.followUp.fields.deal_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.followUp.fields.academic_level') }}</label>
                @foreach(App\Models\FollowUp::ACADEMIC_LEVEL_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('academic_level') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="academic_level_{{ $key }}" name="academic_level" value="{{ $key }}" {{ old('academic_level', '') === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="academic_level_{{ $key }}">{{ trans('cruds.followUp.academic_level.'.$label) }}</label>
                    </div>
                @endforeach
                @if($errors->has('academic_level'))
                    <div class="invalid-feedback">
                        {{ $errors->first('academic_level') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.followUp.fields.academic_level_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="notes">{{ trans('cruds.followUp.fields.notes') }}</label>
                <textarea class="form-control {{ $errors->has('notes') ? 'is-invalid' : '' }}" name="notes" id="notes" required>{{ old('notes') }}</textarea>
                @if($errors->has('notes'))
                    <div class="invalid-feedback">
                        {{ $errors->first('notes') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.followUp.fields.notes_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="date">{{ trans('cruds.followUp.fields.date') }}</label>
                <input class="form-control date {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text" name="date" id="date" value="{{ old('date') }}" required>
                @if($errors->has('date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.followUp.fields.date_helper') }}</span>
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