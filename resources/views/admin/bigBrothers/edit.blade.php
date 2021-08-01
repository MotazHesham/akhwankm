@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.bigBrother.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.big-brothers.update", [$bigBrother->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.bigBrother.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $bigBrother->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bigBrother.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="job">{{ trans('cruds.bigBrother.fields.job') }}</label>
                <input class="form-control {{ $errors->has('job') ? 'is-invalid' : '' }}" type="text" name="job" id="job" value="{{ old('job', $bigBrother->job) }}" required>
                @if($errors->has('job'))
                    <div class="invalid-feedback">
                        {{ $errors->first('job') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bigBrother.fields.job_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="job_place">{{ trans('cruds.bigBrother.fields.job_place') }}</label>
                <input class="form-control {{ $errors->has('job_place') ? 'is-invalid' : '' }}" type="text" name="job_place" id="job_place" value="{{ old('job_place', $bigBrother->job_place) }}" required>
                @if($errors->has('job_place'))
                    <div class="invalid-feedback">
                        {{ $errors->first('job_place') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bigBrother.fields.job_place_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="salary">{{ trans('cruds.bigBrother.fields.salary') }}</label>
                <input class="form-control {{ $errors->has('salary') ? 'is-invalid' : '' }}" type="number" name="salary" id="salary" value="{{ old('salary', $bigBrother->salary) }}" step="0.01" required>
                @if($errors->has('salary'))
                    <div class="invalid-feedback">
                        {{ $errors->first('salary') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bigBrother.fields.salary_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="family_male">{{ trans('cruds.bigBrother.fields.family_male') }}</label>
                <input class="form-control {{ $errors->has('family_male') ? 'is-invalid' : '' }}" type="number" name="family_male" id="family_male" value="{{ old('family_male', $bigBrother->family_male) }}" step="1" required>
                @if($errors->has('family_male'))
                    <div class="invalid-feedback">
                        {{ $errors->first('family_male') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bigBrother.fields.family_male_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="family_female">{{ trans('cruds.bigBrother.fields.family_female') }}</label>
                <input class="form-control {{ $errors->has('family_female') ? 'is-invalid' : '' }}" type="number" name="family_female" id="family_female" value="{{ old('family_female', $bigBrother->family_female) }}" step="1" required>
                @if($errors->has('family_female'))
                    <div class="invalid-feedback">
                        {{ $errors->first('family_female') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bigBrother.fields.family_female_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="brotherhood_reason">{{ trans('cruds.bigBrother.fields.brotherhood_reason') }}</label>
                <textarea class="form-control {{ $errors->has('brotherhood_reason') ? 'is-invalid' : '' }}" name="brotherhood_reason" id="brotherhood_reason" required>{{ old('brotherhood_reason', $bigBrother->brotherhood_reason) }}</textarea>
                @if($errors->has('brotherhood_reason'))
                    <div class="invalid-feedback">
                        {{ $errors->first('brotherhood_reason') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bigBrother.fields.brotherhood_reason_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="charactarstics">{{ trans('cruds.bigBrother.fields.charactarstics') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('charactarstics') ? 'is-invalid' : '' }}" name="charactarstics[]" id="charactarstics" multiple>
                    @foreach($charactarstics as $id => $charactarstic)
                        <option value="{{ $id }}" {{ (in_array($id, old('charactarstics', [])) || $bigBrother->charactarstics->contains($id)) ? 'selected' : '' }}>{{ $charactarstic }}</option>
                    @endforeach
                </select>
                @if($errors->has('charactarstics'))
                    <div class="invalid-feedback">
                        {{ $errors->first('charactarstics') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bigBrother.fields.charactarstics_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="skills">{{ trans('cruds.bigBrother.fields.skills') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('skills') ? 'is-invalid' : '' }}" name="skills[]" id="skills" multiple>
                    @foreach($skills as $id => $skill)
                        <option value="{{ $id }}" {{ (in_array($id, old('skills', [])) || $bigBrother->skills->contains($id)) ? 'selected' : '' }}>{{ $skill }}</option>
                    @endforeach
                </select>
                @if($errors->has('skills'))
                    <div class="invalid-feedback">
                        {{ $errors->first('skills') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bigBrother.fields.skills_helper') }}</span>
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