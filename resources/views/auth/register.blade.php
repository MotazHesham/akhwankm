@extends('layouts.app')

@section('content')

<div class="container  ">
    <div class="" style=" background-color: white ; height: 1700px; padding: 20px"  id="card">
        <div>
            <button id="btnbig" onclick="view('bigbrother')"  style="border-radius:15px; width: 200px; height: 15; background-color: #183273;color: rgb(255, 255, 255); font-family: cairo" class=" form-control  k2  px-3"> التسجيل كأخ أكبر</button>
            <button id="btnsmall"  onclick="view('smallbrother')" style="border-radius:15px; width: 192px; height: 48px; background-color: #F6F6F6 ; font-family: cairo ; "  class="  btn btn-light   k1"> التسجيل كأخ أصغر</button>

        </div>
                    <br><br><br><br>

@if (count($errors)>0)
<div class="alert alert-danger">
    @foreach($errors->all() as $error)
    {{$error}}
    <br>
    @endforeach
</div>
@endif

<div style= "" id="bigbform">
<form method="POST" action="{{route('big-brothers.registerStore')}}" enctype="multipart/form-data" >
        @csrf
            <div>
                @include('auth.partials.common')
            </div>


<div class="row ">
    <div class=" col-md-12 form-group ">

        <label style=" display:block; text-align:right; font-family: cairo ;font-weight:200; color: #837878  ;font-size: 16px" for="charactarstics">{{ trans('cruds.bigBrother.fields.charactarstics') }}</label>

        <select  style=" width: 100%;padding: 16px 20px;border: none;border-radius: 4px; background-color: #f1f1f1;" class="form-control select2 {{ $errors->has('charactarstics') ? 'is-invalid' : '' }}" name="charactarstics[]" id="charactarstics" multiple >
            @foreach($charactarstics as $id => $charactarstics)
                <option value="{{ $id }}" {{ in_array($id, old('charactarstics', [])) ? 'selected' : '' }}>{{ $charactarstics }}</option>
            @endforeach
        </select>

    </div>
    </div>



                <div class="row justify-content-between">
                    <div class="form-group col" id="cities">
                        <label for="html" style=" display:block; text-align:right;  font-family: cairo ;font-weight:200; color:#837878 ;font-size: 16px"> المدينة</label>

                        <select style=" width: 100%;padding: 16px 20px;border: none;border-radius: 4px; background-color: #f1f1f1;" id="city_id" name="city_id"   >

                        </select>
                    </div>

                    <div class="form-group col">
                        <label for="html" style=" display:block; text-align:right;  font-family: cairo ;font-weight:200; color:#837878 ;font-size: 16px"> الدولة</label>

                        <select style=" width: 100%;padding: 16px 20px;border: none;border-radius: 4px; background-color: #f1f1f1;" id="country_id" name="country_id"  onchange="cities()" >
                            @foreach($countries as $id => $name)
                                <option value="{{ $id }}"  {{ old('country_id','') == $id ? 'selected' : '' }}>{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row justify-content-between">

                    <div class="form-group col">
                    <input type="text" id="address" name="address" class="form-control text-right " style="  height: 70px; font-family: cairo; background-color: rgb(255, 255, 255)" placeholder=" العنوان " required>
                    </div>

                    <div class="form-group col">
                        <label for="html" style=" display:block; text-align:right;  font-family: cairo ;font-weight:200; color:#837878 ;font-size: 16px">الحالة الاجتماعية</label>

                        <select style=" width: 100%;padding: 16px 20px;border: none;border-radius: 4px; background-color: #f1f1f1;" id="marital_status" name="marital_status"   >
                            <option value="Single">أعزب</option>
                            <option value="married">متزوج</option>
                            <option value="divorced">مطلق</option>
                            <option value="widowed">أرمل</option>
                            </select>
                </div>

                </div>

                <div class="row justify-content-between">
                    <div class="form-group col">
                        <input type="number" min="0" id="salary" name="salary"  class="form-control text-right " style="  height: 70px; font-family: cairo; background-color: rgb(255, 255, 255)" placeholder=" المرتب " required>

                    </div>
                    <div class="form-group col">
                    <input type="text" id="job" name="job" class="form-control text-right " style="  height: 70px; font-family: cairo; background-color: rgb(255, 255, 255)" placeholder=" المهنة  " required>
                    </div>
                </div>

                <div class="row justify-content-between">
                    <div class="col">
                    </div>
                    <div class="form-group col" style="float: right">
                    <input type="text" id="job_place" name="job_place" class="form-control text-right " style="  height: 70px; font-family: cairo; background-color: rgb(255, 255, 255)" placeholder=" مكان العمل  " required>
                    </div>
                </div>

                <div class="row justify-content-between">
                    <div class="form-group col">
                        <input type="number" min="0" id="family_male" name="family_male" class="form-control text-right " style="  height: 70px; font-family: cairo; background-color: rgb(255, 255, 255)" placeholder=" عدد أفراد الاسرة الذكور " required>

                    </div>
                    <div class="form-group col">
                    <input type="number" min="0" id="family_female" name="family_female" class="form-control text-right " style="  height: 70px; font-family: cairo; background-color: rgb(255, 255, 255)" placeholder="  عدد افراد الاسرة الإناث  " required>
                    </div>
                </div>
        <br>

            <div class="row justify-content-between">
                <div class="form-group ">
                        <textarea class="form-control  text-right" name="brotherhood_reason" id="brotherhood_reason" style=" resize: none; font-family: cairo; background-color: rgb(255, 255, 255) ; border-style: outset; width:580px ;height: 100px; " placeholder="أسباب التآخي" required>{{ old('brotherhood_reason') }}</textarea>
                </div>
            </div>





        <div class="form-group "  >
            <button style="  color: rgb(255, 255, 255); border-radius:20px; width: 150px; height: 15; background-color: #183273; font-family: cairo" type="submit" class=" form-control k4  px-3"> حفظ</button>
        </div>

    </form>
</div>
<div style="display: none" id="smallbform">
    <form method="POST"  action="{{route('small-brothers.registerStore')}}" enctype="multipart/form-data" >
        @csrf

                @include('auth.partials.common')



<div class="row ">
    <div class=" col-md-12 form-group ">

        <label style=" display:block; text-align:right; font-family: cairo ;font-weight:200; color: #837878  ;font-size: 16px" for="charactarstics">{{ trans('cruds.bigBrother.fields.charactarstics') }}</label>

        <select class="form-control select2 {{ $errors->has('charactaristics') ? 'is-invalid' : '' }}" name="charactaristics[]" id="charactaristics" multiple required>
            @foreach($charactaristics as $id => $charactaristics)
                <option value="{{ $id }}" {{ in_array($id, old('charactaristics', [])) ? 'selected' : '' }}>{{ $charactaristics }}</option>
            @endforeach
        </select>

    </div>
    </div>






            <div class="form-group "  >
                <button style="  color: rgb(255, 255, 255); border-radius:20px; width: 150px; height: 15; background-color: #183273; font-family: cairo" type="submit" class=" form-control k4  px-3"> حفظ</button>
            </div>
    </form>
</div>


</div>
</div>
@endsection


@section('scripts')
<script>
    function view(show){
      if(show == 'smallbrother'){
        $('#smallbform').css('display','block');
        $('#card').css('height','1100px');
        $('#bigbform').css('display','none');

        $('#btnbig').css('background-color','#F6F6F6');
        $('#btnbig').css('color','black');
        $('#btnsmall').css('background-color','#183273');
        $('#btnsmall').css('color','rgb(255, 255, 255)');

      }else if(show == 'bigbrother'){
        $('#bigbform').css('display','block');
        $('#card').css('height','1700px');
        $('#smallbform').css('display','none');

        $('#btnsmall').css('background-color','#F6F6F6');
        $('#btnsmall').css('color','black');
        $('#btnbig').css('background-color','#183273');
        $('#btnbig').css('color','rgb(255, 255, 255)');
      }
    }
  </script>

    <script>
        cities();
        function cities(){
            var country_id = $('#country_id').val();
            $.post('{{ route('ajax.cities') }}', {_token:'{{ csrf_token() }}', country_id:country_id}, function(data){
                $('#cities #city_id').html(data)
            });
        }
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
