@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.brothersDealForm.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.brothers-deal-forms.update", [$brothersDealForm->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <input type="hidden" name="specialist_id" value="{{$brothersDealForm->specialist_id}}">
            <div class="row">
                <div class="col-md-4"> 
                    <div class="form-group">
                        <label class="required" for="big_brother_id">{{ trans('cruds.brothersDealForm.fields.big_brother') }}</label>
                        <select class="form-control select2 {{ $errors->has('big_brother') ? 'is-invalid' : '' }}" name="big_brother_id" id="big_brother_id" required>
                            @foreach($big_brothers as $id => $entry)
                                <option value="{{ $id }}" {{ (old('big_brother_id') ? old('big_brother_id') : $brothersDealForm->big_brother->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('big_brother'))
                            <div class="invalid-feedback">
                                {{ $errors->first('big_brother') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.brothersDealForm.fields.big_brother_helper') }}</span>
                    </div>
                </div>
                <div class="col-md-4"> 
                    <div class="form-group">
                        <label class="required" for="small_brother_id">{{ trans('cruds.brothersDealForm.fields.small_brother') }}</label>
                        <select class="form-control select2 {{ $errors->has('small_brother') ? 'is-invalid' : '' }}" name="small_brother_id" id="small_brother_id" required>
                            @foreach($small_brothers as $id => $entry)
                                <option value="{{ $id }}" {{ (old('small_brother_id') ? old('small_brother_id') : $brothersDealForm->small_brother->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('small_brother'))
                            <div class="invalid-feedback">
                                {{ $errors->first('small_brother') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.brothersDealForm.fields.small_brother_helper') }}</span>
                    </div>
                </div> 
                <div class="col-md-4"> 
                    <div class="form-group ">
                        <label class="required" for="specialist_id">{{ trans('cruds.brothersDealForm.fields.specialist') }}</label>
                        <select class="form-control select2 {{ $errors->has('specialist') ? 'is-invalid' : '' }}" name="specialist_id" id="specialist_id" required>
                            @foreach($specialists as $id => $entry)
                                <option value="{{ $id }}" {{ (old('specialist_id') ? old('specialist_id') : $brothersDealForm->specialist->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('specialist'))
                            <div class="invalid-feedback">
                                {{ $errors->first('specialist') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.brothersDealForm.fields.specialist_helper') }}</span>
                    </div>
                </div> 
                <div class="form-group col-md-6">
                    <label class="required" for="day">{{ trans('cruds.brothersDealForm.fields.day') }}</label>
                    <input class="form-control {{ $errors->has('day') ? 'is-invalid' : '' }}" type="text" name="day" id="day" value="{{ old('day', $brothersDealForm->day) }}" required>
                    @if($errors->has('day'))
                        <div class="invalid-feedback">
                            {{ $errors->first('day') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.brothersDealForm.fields.day_helper') }}</span>
                </div>
                <div class="form-group col-md-6">
                    <label class="required" for="department_of_social_service">{{ trans('cruds.brothersDealForm.fields.department_of_social_service') }}</label>
                    <input class="form-control {{ $errors->has('department_of_social_service') ? 'is-invalid' : '' }}" type="text" name="department_of_social_service" id="department_of_social_service" value="{{ old('department_of_social_service', $brothersDealForm->department_of_social_service) }}" required>
                    @if($errors->has('department_of_social_service'))
                        <div class="invalid-feedback">
                            {{ $errors->first('department_of_social_service') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.brothersDealForm.fields.department_of_social_service_helper') }}</span>
                </div>
                <div class="form-group col-md-6">
                    <label class="required" for="executive_committee">{{ trans('cruds.brothersDealForm.fields.executive_committee') }}</label>
                    <input class="form-control {{ $errors->has('executive_committee') ? 'is-invalid' : '' }}" type="text" name="executive_committee" id="executive_committee" value="{{ old('executive_committee', $brothersDealForm->executive_committee) }}" required>
                    @if($errors->has('executive_committee'))
                        <div class="invalid-feedback">
                            {{ $errors->first('executive_committee') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.brothersDealForm.fields.executive_committee_helper') }}</span>
                </div>
                <div class="form-group col-md-6">
                    <label class="required" for="executive_director">{{ trans('cruds.brothersDealForm.fields.executive_director') }}</label>
                    <input class="form-control {{ $errors->has('executive_director') ? 'is-invalid' : '' }}" type="text" name="executive_director" id="executive_director" value="{{ old('executive_director', $brothersDealForm->executive_director) }}" required>
                    @if($errors->has('executive_director'))
                        <div class="invalid-feedback">
                            {{ $errors->first('executive_director') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.brothersDealForm.fields.executive_director_helper') }}</span>
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