@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.approvementForm.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.approvement-forms.update", [$approvementForm->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required">{{ trans('cruds.approvementForm.fields.approved') }}</label>
                @foreach(App\Models\ApprovementForm::APPROVED_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('approved') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="approved_{{ $key }}" name="approved" value="{{ $key }}" {{ old('approved', $approvementForm->approved) === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="approved_{{ $key }}">{{ trans('global.approvment.'.$key) }}</label>
                    </div>
                @endforeach
                @if($errors->has('approved'))
                    <div class="invalid-feedback">
                        {{ $errors->first('approved') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.approvementForm.fields.approved_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="specialist_id">{{ trans('cruds.approvementForm.fields.specialist') }}</label>
                <select class="form-control select2 {{ $errors->has('specialist') ? 'is-invalid' : '' }}" name="specialist_id" id="specialist_id" required>
                    @foreach($specialists as $id => $entry)
                        <option value="{{ $id }}" {{ (old('specialist_id') ? old('specialist_id') : $approvementForm->specialist->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('specialist'))
                    <div class="invalid-feedback">
                        {{ $errors->first('specialist') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.approvementForm.fields.specialist_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="reason">{{ trans('cruds.approvementForm.fields.reason') }}</label>
                <textarea class="form-control {{ $errors->has('reason') ? 'is-invalid' : '' }}" name="reason" id="reason" required>{{ old('reason', $approvementForm->reason) }}</textarea>
                @if($errors->has('reason'))
                    <div class="invalid-feedback">
                        {{ $errors->first('reason') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.approvementForm.fields.reason_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="description">{{ trans('cruds.approvementForm.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description" required>{{ old('description', $approvementForm->description) }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.approvementForm.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="descision">{{ trans('cruds.approvementForm.fields.descision') }}</label>
                <textarea class="form-control {{ $errors->has('descision') ? 'is-invalid' : '' }}" name="descision" id="descision" required>{{ old('descision', $approvementForm->descision) }}</textarea>
                @if($errors->has('descision'))
                    <div class="invalid-feedback">
                        {{ $errors->first('descision') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.approvementForm.fields.descision_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="big_brother_id">{{ trans('cruds.approvementForm.fields.big_brother') }}</label>
                <select class="form-control select2 {{ $errors->has('big_brother') ? 'is-invalid' : '' }}" name="big_brother_id" id="big_brother_id" required>
                    @foreach($big_brothers as $id => $entry)
                        <option value="{{ $id }}" {{ (old('big_brother_id') ? old('big_brother_id') : $approvementForm->big_brother->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('big_brother'))
                    <div class="invalid-feedback">
                        {{ $errors->first('big_brother') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.approvementForm.fields.big_brother_helper') }}</span>
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