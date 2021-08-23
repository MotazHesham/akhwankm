@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.smallBrother.title_singular') }}
    </div> 
    <div class="card-body">
        <form method="POST" action="{{ route("admin.big-brothers.store") }}" enctype="multipart/form-data" id="regForm">
            @csrf 

            <div class="row"> 
                <div class="col-md-6"> 
                    <div class="form-group">
                        <label class="required" for="name">{{ trans('cruds.user.fields.name') }}</label>
                        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                        @if($errors->has('name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.user.fields.name_helper') }}</span>
                    </div>
                </div>
                <div class="col-md-6"> 
                    <div class="form-group">
                        <label class="required" for="email">{{ trans('cruds.user.fields.email') }}</label>
                        <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}" required>
                        @if($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.user.fields.email_helper') }}</span>
                    </div>
                </div>
            </div>

            <div class="row"> 
                <div class="col-md-6"> 
                    <div class="form-group">
                        <label class="required" for="password">{{ trans('cruds.user.fields.password') }}</label>
                        <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password" required>
                        @if($errors->has('password'))
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.user.fields.password_helper') }}</span>
                    </div> 
                </div> 
                <div class="col-md-6"> 
                    <div class="form-group">
                        <label class="required" for="identity_number">{{ trans('cruds.user.fields.identity_number') }}</label>
                        <input class="form-control {{ $errors->has('identity_number') ? 'is-invalid' : '' }}" type="text" name="identity_number" id="identity_number" value="{{ old('identity_number', '') }}" required>
                        @if($errors->has('identity_number'))
                            <div class="invalid-feedback">
                                {{ $errors->first('identity_number') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.user.fields.identity_number_helper') }}</span>
                    </div>
                </div>
            </div>
            
            <div class="row"> 
                <div class="col-md-6"> 

                    <div class="form-group">
                        <label class="required" for="identity_date">{{ trans('cruds.user.fields.identity_date') }}</label>
                        <input class="form-control date {{ $errors->has('identity_date') ? 'is-invalid' : '' }}" type="text" name="identity_date" id="identity_date" value="{{ old('identity_date') }}" required>
                        @if($errors->has('identity_date'))
                            <div class="invalid-feedback">
                                {{ $errors->first('identity_date') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.user.fields.identity_date_helper') }}</span>
                    </div>
                </div>
                <div class="col-md-6"> 
                    <div class="form-group">
                        <label class="required" for="dbo">{{ trans('cruds.user.fields.dbo') }}</label>
                        <input class="form-control date {{ $errors->has('dbo') ? 'is-invalid' : '' }}" type="text" name="dbo" id="dbo" value="{{ old('dbo') }}" required>
                        @if($errors->has('dbo'))
                            <div class="invalid-feedback">
                                {{ $errors->first('dbo') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.user.fields.dbo_helper') }}</span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label class="required" for="cv">{{ trans('cruds.user.fields.cv') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('cv') ? 'is-invalid' : '' }}" id="cv-dropzone" required>
                    </div>
                    @if($errors->has('cv'))
                        <div class="invalid-feedback">
                            {{ $errors->first('cv') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.user.fields.cv_helper') }}</span>
                </div>
                
                <div class="form-group col-md-6">
                    <label for="image">{{ trans('cruds.user.fields.image') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('image') ? 'is-invalid' : '' }}" id="image-dropzone">
                    </div>
                    @if($errors->has('image'))
                        <div class="invalid-feedback">
                            {{ $errors->first('image') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.user.fields.image_helper') }}</span>
                </div> 
                    
            </div>
            
            <div class="row"> 
                <div class="col-md-4"> 
                    <div class="form-group">
                        <label>{{ trans('cruds.user.fields.marital_status') }}</label>
                        @foreach(App\Models\User::MARITAL_STATUS_RADIO as $key => $label)
                            <div class="form-check {{ $errors->has('marital_status') ? 'is-invalid' : '' }}">
                                <input class="form-check-input" type="radio" id="marital_status_{{ $key }}" name="marital_status" value="{{ $key }}" {{ old('marital_status', '') === (string) $key ? 'checked' : '' }}>
                                <label class="form-check-label" for="marital_status_{{ $key }}">{{ trans('global.marital_status.'.$label) }}</label>
                            </div>
                        @endforeach
                        @if($errors->has('marital_status'))
                            <div class="invalid-feedback">
                                {{ $errors->first('marital_status') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.user.fields.marital_status_helper') }}</span>
                    </div>
                </div>
                <div class="col-md-4">  
                    <div class="form-group">
                        <label class="required">{{ trans('cruds.user.fields.gender') }}</label>
                        @foreach(App\Models\User::GENDER_RADIO as $key => $label)
                            <div class="form-check {{ $errors->has('gender') ? 'is-invalid' : '' }}">
                                <input class="form-check-input" type="radio" id="gender_{{ $key }}" name="gender" value="{{ $key }}" {{ old('gender', '') === (string) $key ? 'checked' : '' }} required>
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
                <div class="col-md-4">  
                    <div class="form-group">
                        <label class="required">{{ trans('cruds.user.fields.degree') }}</label>
                        @foreach(App\Models\User::DEGREE_RADIO as $key => $label)
                            <div class="form-check {{ $errors->has('degree') ? 'is-invalid' : '' }}">
                                <input class="form-check-input" type="radio" id="degree_{{ $key }}" name="degree" value="{{ $key }}" {{ old('degree', '') === (string) $key ? 'checked' : '' }} required>
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
            </div>

            
            <div class="row">
                <div class="col-md-6">
                    {{-- country --}}
                    <div class="form-group">
                        <label class="required" for="country_id">{{ trans('cruds.user.fields.country_id') }}</label>
                        <select class="form-control select2 {{ $errors->has('country_id') ? 'is-invalid' : '' }}" name="country_id" id="country_id" required onchange="cities()">
                            @foreach($countries as $id => $name)
                                <option value="{{ $id }}"  {{ old('country_id','') == $id ? 'selected' : '' }}>{{ $name }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('country_id'))
                            <div class="invalid-feedback">
                                {{ $errors->first('country_id') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.user.fields.country_id_helper') }}</span>
                    </div> 
                </div>
                <div class="col-md-6">
                    {{-- cities --}}
                    <div class="form-group" id="cities"> 
                        <label class="required" for="city_id">{{ trans('cruds.user.fields.city_id') }}</label>
                        <select class="form-control select2 {{ $errors->has('city_id') ? 'is-invalid' : '' }}" name="city_id" id="city_id" required> 
                            {{-- ajax call --}}
                        </select>
                        @if($errors->has('city_id'))
                            <div class="invalid-feedback">
                                {{ $errors->first('city_id') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.user.fields.city_id_helper') }}</span>
                    </div> 
                </div>
            </div>

            
            <div class="row"> 
                <div class="col-md-6"> 
                    <div class="form-group">
                        <label for="phone">{{ trans('cruds.user.fields.phone') }}</label>
                        <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', '') }}">
                        @if($errors->has('phone'))
                            <div class="invalid-feedback">
                                {{ $errors->first('phone') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.user.fields.phone_helper') }}</span>
                    </div>

                </div>
                <div class="col-md-6"> 
                    <div class="form-group">
                        <label for="address">{{ trans('cruds.user.fields.address') }}</label>
                        <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', '') }}">
                        @if($errors->has('address'))
                            <div class="invalid-feedback">
                                {{ $errors->first('address') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.user.fields.address_helper') }}</span>
                    </div>
                </div>
            </div>
            
            <div class="row"> 
                <div class="col-md-4"> 
                    <div class="form-group">
                        <label class="required" for="job">{{ trans('cruds.bigBrother.fields.job') }}</label>
                        <input class="form-control {{ $errors->has('job') ? 'is-invalid' : '' }}" type="text" name="job" id="job" value="{{ old('job', '') }}" required>
                        @if($errors->has('job'))
                            <div class="invalid-feedback">
                                {{ $errors->first('job') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.bigBrother.fields.job_helper') }}</span>
                    </div>
                </div>
                <div class="col-md-4"> 
                    <div class="form-group">
                        <label class="required" for="job_place">{{ trans('cruds.bigBrother.fields.job_place') }}</label>
                        <input class="form-control {{ $errors->has('job_place') ? 'is-invalid' : '' }}" type="text" name="job_place" id="job_place" value="{{ old('job_place', '') }}" required>
                        @if($errors->has('job_place'))
                            <div class="invalid-feedback">
                                {{ $errors->first('job_place') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.bigBrother.fields.job_place_helper') }}</span>
                    </div>
                </div>
                <div class="col-md-4"> 
                    <div class="form-group">
                        <label  for="salary">{{ trans('cruds.bigBrother.fields.salary') }}</label>
                        <input class="form-control {{ $errors->has('salary') ? 'is-invalid' : '' }}" type="number" name="salary" id="salary" value="{{ old('salary', '') }}" step="0.01" >
                        @if($errors->has('salary'))
                            <div class="invalid-feedback">
                                {{ $errors->first('salary') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.bigBrother.fields.salary_helper') }}</span>
                    </div>
                </div>
            </div>

            <div class="row"> 
                <div class="col-md-6"> 

                    <div class="form-group">
                        <label  for="family_male">{{ trans('cruds.bigBrother.fields.family_male') }}</label>
                        <input class="form-control {{ $errors->has('family_male') ? 'is-invalid' : '' }}" type="number" name="family_male" id="family_male" value="{{ old('family_male', '') }}" step="1" >
                        @if($errors->has('family_male'))
                            <div class="invalid-feedback">
                                {{ $errors->first('family_male') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.bigBrother.fields.family_male_helper') }}</span>
                    </div>
                </div>
                <div class="col-md-6"> 
                    <div class="form-group">
                        <label  for="family_female">{{ trans('cruds.bigBrother.fields.family_female') }}</label>
                        <input class="form-control {{ $errors->has('family_female') ? 'is-invalid' : '' }}" type="number" name="family_female" id="family_female" value="{{ old('family_female', '') }}" step="1" >
                        @if($errors->has('family_female'))
                            <div class="invalid-feedback">
                                {{ $errors->first('family_female') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.bigBrother.fields.family_female_helper') }}</span>
                    </div>
                </div>
            </div>
        
            <div class="form-group">
                <label  for="brotherhood_reason">{{ trans('cruds.bigBrother.fields.brotherhood_reason') }}</label>
                <textarea class="form-control {{ $errors->has('brotherhood_reason') ? 'is-invalid' : '' }}" name="brotherhood_reason" id="brotherhood_reason" >{{ old('brotherhood_reason') }}</textarea>
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

            <div class="form-group">
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

            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>

        </form>
    </div> 
</div>
@endsection
@section('scripts') 
<script>
    cities();
</script>
<script>
  Dropzone.options.cvDropzone = {
  url: '{{ route('admin.users.storeMedia') }}',
  maxFilesize: 2, // MB
  maxFiles: 1,
  addRemoveLinks: true,
  headers: {
    'X-CSRF-TOKEN': "{{ csrf_token() }}"
  },
  params: {
    size: 2
  },
  success: function (file, response) {
    $('form').find('input[name="cv"]').remove()
    $('form').append('<input type="hidden" name="cv" value="' + response.name + '">')
  },
  removedfile: function (file) {
    file.previewElement.remove()
    if (file.status !== 'error') {
      $('form').find('input[name="cv"]').remove()
      this.options.maxFiles = this.options.maxFiles + 1
    }
  },
  init: function () {
@if(isset($user) && $user->cv)
    var file = {!! json_encode($user->cv) !!}
        this.options.addedfile.call(this, file)
    file.previewElement.classList.add('dz-complete')
    $('form').append('<input type="hidden" name="cv" value="' + file.file_name + '">')
    this.options.maxFiles = this.options.maxFiles - 1
@endif
  },
   error: function (file, response) {
       if ($.type(response) === 'string') {
           var message = response //dropzone sends it's own error messages in string
       } else {
           var message = response.errors.file
       }
       file.previewElement.classList.add('dz-error')
       _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
       _results = []
       for (_i = 0, _len = _ref.length; _i < _len; _i++) {
           node = _ref[_i]
           _results.push(node.textContent = message)
       }

       return _results
   }
}
</script>
<script>
    Dropzone.options.imageDropzone = {
        url: '{{ route('admin.users.storeMedia') }}',
        maxFilesize: 2, // MB
        acceptedFiles: '.jpeg,.jpg,.png,.gif',
        maxFiles: 1,
        addRemoveLinks: true,
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        params: {
            size: 2,
            width: 4096,
            height: 4096
        },
        success: function (file, response) {
            $('form').find('input[name="image"]').remove()
            $('form').append('<input type="hidden" name="image" value="' + response.name + '">')
        },
        removedfile: function (file) {
            file.previewElement.remove()
            if (file.status !== 'error') {
                $('form').find('input[name="image"]').remove()
                this.options.maxFiles = this.options.maxFiles + 1
            }
        }, 
        error: function (file, response) {
            if ($.type(response) === 'string') {
                var message = response //dropzone sends it's own error messages in string
            } else {
                var message = response.errors.file
            }
            file.previewElement.classList.add('dz-error')
            _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
            _results = []
            for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                node = _ref[_i]
                _results.push(node.textContent = message)
            }

            return _results
        }
    }
</script>
@endsection
