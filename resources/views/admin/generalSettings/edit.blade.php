@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('cruds.generalSettings.title') }}
        </div>


        <div class="card-body">
            <form method="POST" action="{{ route('admin.general-settings.update', [$general_settings->id]) }}"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <div class="row">
                    <div class="col-md-6">

                        <div class="form-group">
                            <label class="required" for="terms">{{ trans('cruds.generalSettings.fields.terms') }}</label>
                            <textarea class="form-control {{ $errors->has('terms') ? 'is-invalid' : '' }}" type="text"
                                name="terms" id="terms" required>
                                {{ old('terms', $general_settings->terms) }}
                            </textarea>
                            @if ($errors->has('terms'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('terms') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.generalSettings.fields.terms_helper') }}</span>
                        </div>

                        
                        <div class="form-group">
                            <label for="logo">{{ trans('cruds.generalSettings.fields.logo') }}</label>
                            <div class="needsclick dropzone {{ $errors->has('logo') ? 'is-invalid' : '' }}" id="logo-dropzone">
                            </div>
                            @if($errors->has('logo'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('logo') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.generalSettings.fields.logo_helper') }}</span>
                        </div> 
                        
                    </div>
                    <div class="col-md-6">
                        <h4>الوان لوحة التحكم </h4>
                        {{-- admin_color --}}
                        <div class="form-group">
                            <label class="required"
                                for="admin_color">{{ trans('cruds.generalSettings.fields.admin_color') }}</label>
                            <input class="form-control {{ $errors->has('admin_color') ? 'is-invalid' : '' }}" type="color"
                                name="admin_color" id="admin_color"
                                value="{{ old('admin_color', $general_settings->admin_color) }}" required>
                            @if ($errors->has('admin_color'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('admin_color') }}
                                </div>
                            @endif
                        </div>
                        {{-- big_brother_color --}}
                        <div class="form-group">
                            <label class="required"
                                for="big_brother_color">{{ trans('cruds.generalSettings.fields.big_brother_color') }}</label>
                            <input class="form-control {{ $errors->has('big_brother_color') ? 'is-invalid' : '' }}"
                                type="color" name="big_brother_color" id="big_brother_color"
                                value="{{ old('big_brother_color', $general_settings->big_brother_color) }}" required>
                            @if ($errors->has('big_brother_color'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('big_brother_color') }}
                                </div>
                            @endif
                        </div>

                        {{-- small_brother_color --}}
                        <div class="form-group">
                            <label class="required"
                                for="small_brother_color">{{ trans('cruds.generalSettings.fields.small_brother_color') }}</label>
                            <input class="form-control {{ $errors->has('small_brother_color') ? 'is-invalid' : '' }}"
                                type="color" name="small_brother_color" id="small_brother_color"
                                value="{{ old('small_brother_color', $general_settings->small_brother_color) }}"
                                required>
                            @if ($errors->has('small_brother_color'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('small_brother_color') }}
                                </div>
                            @endif
                        </div>

                        {{-- specialist_color --}}
                        <div class="form-group">
                            <label class="required"
                                for="specialist_color">{{ trans('cruds.generalSettings.fields.specialist_color') }}</label>
                            <input class="form-control {{ $errors->has('specialist_color') ? 'is-invalid' : '' }}"
                                type="color" name="specialist_color" id="specialist_color"
                                value="{{ old('specialist_color', $general_settings->specialist_color) }}" required>
                            @if ($errors->has('specialist_color'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('specialist_color') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <button class="btn btn-warning btn-block text-white" type="submit">
                        {{ trans('global.update') }}
                    </button>
                </div>
            </form>
        </div>
    </div>



@endsection

@section('scripts')
@parent


<script>
    Dropzone.options.logoDropzone = {
        url: '{{ route('admin.general-settings.storeMedia') }}',
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
            $('form').find('input[name="logo"]').remove()
            $('form').append('<input type="hidden" name="logo" value="' + response.name + '">')
        },
        removedfile: function (file) {
            file.previewElement.remove()
            if (file.status !== 'error') {
                $('form').find('input[name="logo"]').remove()
                this.options.maxFiles = this.options.maxFiles + 1
            }
        },
        init: function () {
        @if(isset($general_settings) && $general_settings->logo)
            var file = {!! json_encode($general_settings->logo) !!}
                this.options.addedfile.call(this, file)
            this.options.thumbnail.call(this, file, file.preview)
            file.previewElement.classList.add('dz-complete')
            $('form').append('<input type="hidden" name="logo" value="' + file.file_name + '">')
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