


<div class="row justify-content-between">
    <div class="form-group col">
        <input type="text"  id="email" name="email" class="form-control text-right " style="  color: black; font-family: cairo; background-color: rgb(255, 255, 255)" placeholder="البريد الإلكتروني" required>
    </div>
    <div class=" form-group col">
        <input type="text" id="name" name="name" class="form-control text-right " style="  font-family: cairo;background-color: rgb(255, 255, 255)" placeholder=" اسم المستخدم" required>
    </div>
</div>
<div class="row justify-content-between">
    <div class="form-group col">
        <input type="password" id="conf_password" name="conf_password" class="form-control text-right " style="  height: 70px; font-family: cairo; background-color: rgb(255, 255, 255)" placeholder="إعادة كتابة كلمة السر   " required>
    </div>
    <div class="form-group col">
        <input type="password" id="password" name="password"  class="form-control text-right " style=" height: 70px;  font-family: cairo;background-color: rgb(255, 255, 255)" placeholder="   كلمة السر " required>
    </div>
</div>
<div class="row justify-content-between">
    <div class="form-group col">
    <input type="text"  id="phone" name="phone"  class="form-control text-right " style="  height: 70px; font-family: cairo; background-color: rgb(255, 255, 255)" placeholder="رقم الهاتف" required>
    </div>
    <div class="form-group col">
        <input type="text" id="dbo" name="dbo" class="form-control text-right date" style=" height: 70px;  font-family: cairo;background-color: rgb(255, 255, 255)" placeholder=" تاريخ الميلاد "  required>
    </div>
</div>
<div class="row justify-content-between">
    <div class="form-group col">
        <input type="text" id="identity_date" name="identity_date" class="form-control text-right date" style="  height: 70px; font-family: cairo; background-color: rgb(255, 255, 255)" placeholder=" تاريخ إنتهاء الهوية " required>
    </div>
    <div class="form-group col">
        <input type="text" id="identity_number" name="identity_number" class="form-control text-right " style=" height: 70px;  font-family: cairo;background-color: rgb(255, 255, 255)" placeholder="رقم الهوية" required>
    </div>
</div>

<div class="row justify-content-between">
    <div class="form-group col">
    <label for="html" style="font-weight:200; font-family: cairo ; color: black ;font-size: 18px">ذكر</label>&nbsp;&nbsp;
    <input style="" type="radio" id="html" name="gender" value="male" required>&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp; <label for="html" style="font-weight:200; font-family: cairo ; color: black ; font-size: 18px">انثى</label>&nbsp;&nbsp;
    <input type="radio" id="html" name="gender" value="female" required>

    </div>

    <div class="form-group col" style="float: right">
        <label   for="html" style=" display:block; text-align:right; font-family: cairo ;font-weight:200; color: #837878  ;font-size: 16px">الدرجة العلمية</label>

        <select  style=" width: 100%;padding: 16px 20px;border: none;border-radius: 4px; background-color: #f1f1f1;" id="degree" name="degree"   >
            <option value="Literate without Certificate">القراءة والكتابة بدون شهادة</option>
            <option value="Primary Certificate">الشهادة الابتدائية</option>
            <option value="middle school certificate">شهادة المدرسة المتوسطة</option>
            <option value="High School Certificate">شهادة الثانوية العامة</option>
            <option value="Diploma">شهادة دبلوم</option>
            <option value="Bachelors Degree">درجة باكلريوس</option>
            <option value="Masters Degree">ماجيستير</option>
            </select>
    </div>


</div>



<div class="form-group">
    <label style=" display:block; text-align:right; font-family: cairo ;font-weight:200; color: #837878  ;font-size: 16px" class="required">{{ trans('cruds.user.fields.cv') }}</label>

    <div class="needsclick dropzone {{ $errors->has('cv') ? 'is-invalid' : '' }}" id="cv-dropzone" required>
    </div>
    @if($errors->has('cv'))
        <div class="invalid-feedback">
            {{ $errors->first('cv') }}
        </div>
    @endif
    <span class="help-block">{{ trans('cruds.user.fields.cv_helper') }}</span>
</div>





<div class="row ">
    <div class=" col-md-12 form-group ">

<label style=" display:block; text-align:right; font-family: cairo ;font-weight:200; color: #837878  ;font-size: 16px"  for="skills">{{ trans('cruds.bigBrother.fields.skills') }}</label>

<select  style=" width: 100%;padding: 16px 20px;border: none;border-radius: 4px; background-color: #f1f1f1;" class="form-control select2 {{ $errors->has('skills') ? 'is-invalid' : '' }}" name="skills[]" id="skills" multiple>
    @foreach($skills as $id => $skills)
        <option value="{{ $id }}" {{ in_array($id, old('skills', [])) ? 'selected' : '' }}>{{ $skills }}</option>
    @endforeach
</select>
</div>
</div>

