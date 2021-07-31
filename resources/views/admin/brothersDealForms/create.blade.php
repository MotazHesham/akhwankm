@extends('layouts.admin')
@section('content')
<div class="card">
  <div class="card-header">
      {{ trans('global.create') }} {{ trans('cruds.brothersDealForm.title_singular') }}
  </div>

  <div class="card-body">
      <form method="POST" action="{{ route("admin.brothers-deal-forms.store") }}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
              <label class="required" for="day">{{ trans('cruds.brothersDealForm.fields.day') }}</label>
              <input class="form-control {{ $errors->has('day') ? 'is-invalid' : '' }}" type="text" name="day" id="day" value="{{ old('day', '') }}" required>
              @if($errors->has('day'))
                  <div class="invalid-feedback">
                      {{ $errors->first('day') }}
                  </div>
              @endif
              <span class="help-block">{{ trans('cruds.brothersDealForm.fields.day_helper') }}</span>
          </div>
          <div class="form-group">
              <label class="required" for="department_of_social_service">{{ trans('cruds.brothersDealForm.fields.department_of_social_service') }}</label>
              <input class="form-control {{ $errors->has('department_of_social_service') ? 'is-invalid' : '' }}" type="text" name="department_of_social_service" id="department_of_social_service" value="{{ old('department_of_social_service', '') }}" required>
              @if($errors->has('department_of_social_service'))
                  <div class="invalid-feedback">
                      {{ $errors->first('department_of_social_service') }}
                  </div>
              @endif
              <span class="help-block">{{ trans('cruds.brothersDealForm.fields.department_of_social_service_helper') }}</span>
          </div>
          <div class="form-group">
              <label class="required" for="executive_committee">{{ trans('cruds.brothersDealForm.fields.executive_committee') }}</label>
              <input class="form-control {{ $errors->has('executive_committee') ? 'is-invalid' : '' }}" type="text" name="executive_committee" id="executive_committee" value="{{ old('executive_committee', '') }}" required>
              @if($errors->has('executive_committee'))
                  <div class="invalid-feedback">
                      {{ $errors->first('executive_committee') }}
                  </div>
              @endif
              <span class="help-block">{{ trans('cruds.brothersDealForm.fields.executive_committee_helper') }}</span>
          </div>
          <div class="form-group">
              <label class="required" for="social_worker">{{ trans('cruds.brothersDealForm.fields.social_worker') }}</label>
              <input class="form-control {{ $errors->has('social_worker') ? 'is-invalid' : '' }}" type="text" name="social_worker" id="social_worker" value="{{ old('social_worker', '') }}" required>
              @if($errors->has('social_worker'))
                  <div class="invalid-feedback">
                      {{ $errors->first('social_worker') }}
                  </div>
              @endif
              <span class="help-block">{{ trans('cruds.brothersDealForm.fields.social_worker_helper') }}</span>
          </div>
          <div class="form-group">
              <label class="required" for="executive_director">{{ trans('cruds.brothersDealForm.fields.executive_director') }}</label>
              <input class="form-control {{ $errors->has('executive_director') ? 'is-invalid' : '' }}" type="text" name="executive_director" id="executive_director" value="{{ old('executive_director', '') }}" required>
              @if($errors->has('executive_director'))
                  <div class="invalid-feedback">
                      {{ $errors->first('executive_director') }}
                  </div>
              @endif
              <span class="help-block">{{ trans('cruds.brothersDealForm.fields.executive_director_helper') }}</span>
          </div>
          <div class="form-group">
              <label class="required" for="big_brother_id">{{ trans('cruds.brothersDealForm.fields.big_brother') }}</label>
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
              <span class="help-block">{{ trans('cruds.brothersDealForm.fields.big_brother_helper') }}</span>
          </div>
          <div class="form-group">
              <label class="required" for="small_brother_id">{{ trans('cruds.brothersDealForm.fields.small_brother') }}</label>
              <select class="form-control select2 {{ $errors->has('small_brother') ? 'is-invalid' : '' }}" name="small_brother_id" id="small_brother_id" required>
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
          <div class="form-group">
              <label class="required" for="approvement_form">{{ trans('cruds.brothersDealForm.fields.approvement_form') }}</label>
              <input class="form-control {{ $errors->has('approvement_form') ? 'is-invalid' : '' }}" type="number" name="approvement_form" id="approvement_form" value="{{ old('approvement_form', '') }}" step="1" required>
              @if($errors->has('approvement_form'))
                  <div class="invalid-feedback">
                      {{ $errors->first('approvement_form') }}
                  </div>
              @endif
              <span class="help-block">{{ trans('cruds.brothersDealForm.fields.approvement_form_helper') }}</span>
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