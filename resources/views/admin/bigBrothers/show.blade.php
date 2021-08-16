@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.bigBrother.title') }}
    </div>
    <div class="row"> 
        <div class="col-md-6"> 
    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.big-brothers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.bigBrother.fields.id') }}
                        </th>
                        <td >
                            {{ $bigBrother->id }}
                            <input id="bigbrother" value="{{$bigBrother->id}}" type="hidden">
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bigBrother.fields.user') }}
                        </th>
                        <td>
                            {{ $bigBrother->user->email ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bigBrother.fields.job') }}
                        </th>
                        <td>
                            {{ $bigBrother->job }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bigBrother.fields.job_place') }}
                        </th>
                        <td>
                            {{ $bigBrother->job_place }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bigBrother.fields.salary') }}
                        </th>
                        <td>
                            {{ $bigBrother->salary }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.country_id') }}
                        </th>
                        <td>
                            {{ $bigBrother->user->city->country->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.city_id') }}
                        </th>
                        <td>
                            {{ $bigBrother->user->city->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bigBrother.fields.family_male') }}
                        </th>
                        <td>
                            {{ $bigBrother->family_male }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bigBrother.fields.family_female') }}
                        </th>
                        <td>
                            {{ $bigBrother->family_female }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bigBrother.fields.brotherhood_reason') }}
                        </th>
                        <td>
                            {{ $bigBrother->brotherhood_reason }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bigBrother.fields.charactarstics') }}
                        </th>
                        <td>
                            @foreach($bigBrother->charactarstics as $key => $charactarstics)
                                <span class="label label-info">{{ $charactarstics->name_ar }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bigBrother.fields.skills') }}
                        </th>
                        <td>
                            @foreach($bigBrother->skills as $key => $skills)
                                <span class="label label-info">{{ $skills->name_ar }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="col-md-4" >
    <div > 
      @if(!empty($bigBrother->small_brother_id))
    

          <h4 style="text-align: center;padding:20px;">  {{ trans('cruds.bigBrother.small') }}</h4>
          <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('cruds.smallBrother.fields.id') }}
                    </th>
                    <td>
                        {{ $bigBrother->small_brother->id }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.smallBrother.fields.user') }}
                    </th>
                    <td>
                        {{ $bigBrother->small_brother->user->email ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.smallBrother.fields.skills') }}
                    </th>
                    <td>
                        @foreach($bigBrother->small_brother->skills as $key => $skills)
                            <span class="label label-info">{{ $skills->name_ar }}</span>
                        @endforeach
                    </td>
                </tr>
        
                <tr>
                    <th>
                        {{ trans('cruds.smallBrother.fields.charactaristics') }}
                    </th>
                    <td>
                        @foreach($bigBrother->small_brother->charactaristics as $key => $charactaristics)
                            <span class="label label-info">{{ $charactaristics->name_ar }}</span>
                        @endforeach
                    </td>
                </tr>
            </tbody>
        </table>
      @else
      <div class="alert alert-danger" role="alert" style="margin-top:100px;padding:50px;">
          {{ trans('cruds.bigBrother.no_brother') }}
      </div>
    
      @endif

</div>
<div style="margin-top:60px;">
    <h4 style="text-align: center;padding:20px;">{{ trans('cruds.bigBrother.choose') }}</h4>
                @include('auth.partials.choose_small_brothers')

        </div>
</div>

@endsection

@section('scripts')



<script type="text/javascript">

  function choosebrother(small_brother_id) {
    var big_id = document.getElementById("bigbrother").value;
 
$.ajax({
    type: 'post',
    url: "{{route('admin.choose.smallbrother')}}",
    data: {
        "_token": "{{ csrf_token() }}",
        'small_brother_id': small_brother_id,
        'big_brother_id' : big_id,
         
    },
    success: function (data) {
          if (data.status == true) {
      setTimeout(function(){
           location.reload(); 
      }, 1000); 

    }
    }
});
  }
</script>
@endsection
