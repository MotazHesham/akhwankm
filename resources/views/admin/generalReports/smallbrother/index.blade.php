@extends('layouts.admin')
@section('content')
<div class="card">
<div class="card-header">
      التقارير
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route("admin.smallbrother.reports") }}" enctype="multipart/form-data" id="regForm" target="blank">
            @csrf
            <div class="row">
                <div class="form-group col-md-6">
                    <label >تاريخ التسجيل من </label>
            <input name="start_date"  class="form-control date"  >
                </div>
                <div class="form-group col-md-6">
                    <label >إلي</label>
            <input name="end_date"  class="form-control date " >
                </div>
            
            <div class="col-md-6">
                <div class="form-group">
                    <label  for="dbo">تاريخ ميلادهم من</label>
                    <input class="form-control date {{ $errors->has('dbo') ? 'is-invalid' : '' }}" type="text" name="dbo_start" id="dbo" value="{{ old('dbo') }}" >
                    @if($errors->has('dbo'))
                        <div class="invalid-feedback">
                            {{ $errors->first('dbo') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.user.fields.dbo_helper') }}</span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label  for="dbo">  إلي</label>
                    <input class="form-control date {{ $errors->has('dbo') ? 'is-invalid' : '' }}" type="text" name="dbo_end" id="dbo" value="{{ old('dbo') }}" >
                    @if($errors->has('dbo'))
                        <div class="invalid-feedback">
                            {{ $errors->first('dbo') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.user.fields.dbo_helper') }}</span>
                </div>
            </div>
            <div class="col-md-6">
                <label for="charactarstics">{{ trans('cruds.bigBrother.fields.charactarstics') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('charactarstics') ? 'is-invalid' : '' }}" name="charactarstics[]" id="charactarstics" multiple>
                    @foreach($charactarstics as $id => $charactarstics)
                        <option value="{{ $id }}" {{ in_array($id, old('charactarstics', [])) ? 'selected' : '' }}>{{ $charactarstics }}</option>
                    @endforeach
                </select>
                @if($errors->has('charactarstics'))
                    <div class="invalid-feedback">
                        {{ $errors->first('charactarstics') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bigBrother.fields.charactarstics_helper') }}</span>
            </div>

            <div class="col-md-6">
                <label for="skills">{{ trans('cruds.bigBrother.fields.skills') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('skills') ? 'is-invalid' : '' }}" name="skills[]" id="skills" multiple>
                    @foreach($skills as $id => $skills)
                        <option value="{{ $id }}" {{ in_array($id, old('skills', [])) ? 'selected' : '' }}>{{ $skills }}</option>
                    @endforeach
                </select>
                @if($errors->has('skills'))
                    <div class="invalid-feedback">
                        {{ $errors->first('skills') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bigBrother.fields.skills_helper') }}</span>
            </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label >{{ trans('cruds.user.fields.degree') }}</label>
                        @foreach(App\Models\User::DEGREE_RADIO as $key => $label)
                            <div class="form-check {{ $errors->has('degree') ? 'is-invalid' : '' }}">
                                <input class="form-check-input" type="radio" id="degree_{{ $key }}" name="degree" value="{{ $key }}" {{ old('degree', '') === (string) $key ? 'checked' : '' }} >
                                <label class="form-check-label" for="degree_{{ $key }}">{{ trans('global.degree.'.$label) }}</label>
                            </div>
                        @endforeach
                        @if($errors->has('degree'))
                            <div class="invalid-feedback">
                                {{ $errors->first('degree') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.user.fields.degree_helper') }}</span>
                    </div>
                </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label >{{ trans('cruds.user.fields.gender') }}</label>
                    @foreach(App\Models\User::GENDER_RADIO as $key => $label)
                        <div class="form-check {{ $errors->has('gender') ? 'is-invalid' : '' }}">
                            <input class="form-check-input" type="radio" id="gender_{{ $key }}" name="gender" value="{{ $key }}" {{ old('gender', '') === (string) $key ? 'checked' : '' }} >
                            <label class="form-check-label" for="gender_{{ $key }}">{{ trans('global.gender.'.$label) }}</label>
                        </div>
                    @endforeach
                    @if($errors->has('gender'))
                        <div class="invalid-feedback">
                            {{ $errors->first('gender') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.user.fields.gender_helper') }}</span>
                </div>
            </div>
            </div>
            <button type="submit" class="btn btn-success">   <i class="fa-fw fas fa-search "></i>  بحث </button>
        </form>
    </div>
@endsection
@section('scripts')
<script>
    cities();
</script>
@endsection
