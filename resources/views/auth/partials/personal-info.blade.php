
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>{{ trans('cruds.user.fields.marital_status') }}</label> 
            <select class="form-control select2 {{ $errors->has('marital_status') ? 'is-invalid' : '' }}" name="marital_status" id="marital_status" required>
                @foreach(App\Models\User::MARITAL_STATUS_RADIO as $key => $label)
                    <option value="{{ $key }}"  {{ old('marital_status','') == $key ? 'selected' : '' }}>{{ trans('global.marital_status.'.$label) }}</option>
                @endforeach
            </select>
            @if($errors->has('marital_status'))
                <div class="invalid-feedback">
                    {{ $errors->first('marital_status') }}
                </div>
            @endif
            <span class="help-block">{{ trans('cruds.user.fields.marital_status_helper') }}</span>
        </div>
    </div>
    <div class="col-md-6"> 
        <div class="form-group">
            <label class="required">{{ trans('cruds.user.fields.degree') }}</label> 
            <select class="form-control select2 {{ $errors->has('degree') ? 'is-invalid' : '' }}" name="degree" id="degree" required>
                @foreach(App\Models\User::DEGREE_RADIO as $key => $label)
                    <option value="{{ $key }}"  {{ old('degree','') == $key ? 'selected' : '' }}>{{ trans('global.degree.'.$label) }}</option>
                @endforeach
            </select>
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
        <div class="form-group">
            <label class="required" for="family_female">{{ trans('cruds.bigBrother.fields.family_female') }}</label>
            <input class="form-control {{ $errors->has('family_female') ? 'is-invalid' : '' }}" type="number" name="family_female" id="family_female" value="{{ old('family_female', '') }}" step="1" required>
            @if($errors->has('family_female'))
                <div class="invalid-feedback">
                    {{ $errors->first('family_female') }}
                </div>
            @endif
            <span class="help-block">{{ trans('cruds.bigBrother.fields.family_female_helper') }}</span>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="required" for="family_male">{{ trans('cruds.bigBrother.fields.family_male') }}</label>
            <input class="form-control {{ $errors->has('family_male') ? 'is-invalid' : '' }}" type="number" name="family_male" id="family_male" value="{{ old('family_male', '') }}" step="1" required>
            @if($errors->has('family_male'))
                <div class="invalid-feedback">
                    {{ $errors->first('family_male') }}
                </div>
            @endif
            <span class="help-block">{{ trans('cruds.bigBrother.fields.family_male_helper') }}</span>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
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
    </div>
    <div class="col-md-6">
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
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="required" for="brotherhood_reason">{{ trans('cruds.bigBrother.fields.brotherhood_reason') }}</label>
            <textarea class="form-control {{ $errors->has('brotherhood_reason') ? 'is-invalid' : '' }}" name="brotherhood_reason" id="brotherhood_reason" required>{{ old('brotherhood_reason') }}</textarea>
            @if($errors->has('brotherhood_reason'))
                <div class="invalid-feedback">
                    {{ $errors->first('brotherhood_reason') }}
                </div>
            @endif
            <span class="help-block">{{ trans('cruds.bigBrother.fields.brotherhood_reason_helper') }}</span>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="cv">{{ trans('cruds.user.fields.cv') }}</label>
            <div class="needsclick dropzone {{ $errors->has('cv') ? 'is-invalid' : '' }}" id="cv-dropzone" required>
            </div>
            @if($errors->has('cv'))
                <div class="invalid-feedback">
                    {{ $errors->first('cv') }}
                </div>
            @endif
            <span class="help-block">{{ trans('cruds.user.fields.cv_helper') }}</span>
        </div>
    </div>
</div> 