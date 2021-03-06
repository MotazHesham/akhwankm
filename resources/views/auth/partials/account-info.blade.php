

<h4 style="text-align: right">بيانات الدخول</h4>

<hr width="120" style=" margin-left: 86%; margin-bottom: 2rem; border-top: 2px solid #49ad6a;">

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

<br><br>
<h4 style="text-align: right">بياناتك</h4>

<hr width="75" style=" margin-left: 92%; margin-bottom: 2rem; border-top: 2px solid #49ad6a;">

<div class="row">
    <div class="col-md-4">
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
    <div class="col-md-4">
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
    <div class="col-md-4"> 
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
</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label class="required">{{ trans('cruds.user.fields.gender') }}</label> 
            <select class="form-control select2 {{ $errors->has('gender') ? 'is-invalid' : '' }}" name="gender" id="gender" required>
                @foreach(App\Models\User::GENDER_RADIO as $key => $label)
                    <option value="{{ $key }}"  {{ old('gender','') == $key ? 'selected' : '' }}>{{ trans('global.gender.'.$label) }}</option>
                @endforeach
            </select>
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
    <div class="col-md-4"> 
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


<br><br>
<h4 style="text-align: right">العنوان</h4>

<hr width="75" style=" margin-left: 92%; margin-bottom: 2rem; border-top: 2px solid #49ad6a;">

<div class="row">
    <div class="col-md-4"> 
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
    <div class="col-md-4"> 
        <div class="form-group">
            <label for="city">{{ trans('cruds.user.fields.city') }}</label>
            <input class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }}" type="text" name="city" id="city" value="{{ old('city', '') }}">
            @if($errors->has('city'))
                <div class="invalid-feedback">
                    {{ $errors->first('city') }}
                </div>
            @endif
            <span class="help-block">{{ trans('cruds.user.fields.city_helper') }}</span>
        </div>
    </div>
    <div class="col-md-4"> 
        <div class="form-group">
            <label for="country">{{ trans('cruds.user.fields.country') }}</label>
            <input class="form-control {{ $errors->has('country') ? 'is-invalid' : '' }}" type="text" name="country" id="country" value="{{ old('country', '') }}">
            @if($errors->has('country'))
                <div class="invalid-feedback">
                    {{ $errors->first('country') }}
                </div>
            @endif
            <span class="help-block">{{ trans('cruds.user.fields.country_helper') }}</span>
        </div>
    </div>
</div>


<br><br>
<h4 style="text-align: right">الوظيفة</h4>

<hr width="75" style=" margin-left: 92%; margin-bottom: 2rem; border-top: 2px solid #49ad6a;">

<div class="row">
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
            <label class="required" for="salary">{{ trans('cruds.bigBrother.fields.salary') }}</label>
            <input class="form-control {{ $errors->has('salary') ? 'is-invalid' : '' }}" type="number" name="salary" id="salary" value="{{ old('salary', '') }}" step="0.01" required>
            @if($errors->has('salary'))
                <div class="invalid-feedback">
                    {{ $errors->first('salary') }}
                </div>
            @endif
            <span class="help-block">{{ trans('cruds.bigBrother.fields.salary_helper') }}</span>
        </div>
    </div>
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
</div>


