@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.smallBrother.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.small-brothers.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="row" >
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

            <div class="row" >
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
            <div class="row" >
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
        <div class="row" >
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
        </div>
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
            <div class="form-group">
                <label for="cv">{{ trans('cruds.user.fields.cv') }}</label>
                <div class="needsclick dropzone {{ $errors->has('cv') ? 'is-invalid' : '' }}" id="cv-dropzone">
                </div>
                @if($errors->has('cv'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cv') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.cv_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="skills">{{ trans('cruds.smallBrother.fields.skills') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('skills') ? 'is-invalid' : '' }}" name="skills[]" id="skills" multiple required>
                    @foreach($skills as $id => $skills)
                        <option value="{{ $id }}" {{ in_array($id, old('skills', [])) ? 'selected' : '' }}>{{ $skills }}</option>
                    @endforeach
                </select>
                @if($errors->has('skills'))
                    <div class="invalid-feedback">
                        {{ $errors->first('skills') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smallBrother.fields.skills_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="charactaristics">{{ trans('cruds.smallBrother.fields.charactaristics') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('charactaristics') ? 'is-invalid' : '' }}" name="charactaristics[]" id="charactaristics" multiple required>
                    @foreach($charactaristics as $id => $charactaristics)
                        <option value="{{ $id }}" {{ in_array($id, old('charactaristics', [])) ? 'selected' : '' }}>{{ $charactaristics }}</option>
                    @endforeach
                </select>
                @if($errors->has('charactaristics'))
                    <div class="invalid-feedback">
                        {{ $errors->first('charactaristics') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smallBrother.fields.charactaristics_helper') }}</span>
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
@endsection
