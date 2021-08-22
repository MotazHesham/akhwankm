@if(isset($small_brothers) && count ($small_brothers)) 
<div style="margin-top:60px;">
    <form method="Post" action="{{route('specialist.choose_smallbrother')}}">
        @csrf
        <h4 style="text-align: center;padding:20px;">{{ trans('cruds.bigBrother.choose') }}</h4>
        <input id="bigbrother" name="big_brother_id" value="{{$bigBrother->id}}" type="hidden">

        @include('auth.partials.choose_small_brothers')

        <div class="form-group">
            <button class="btn btn-danger" type="submit">
                {{ trans('global.save') }}
            </button>
        </div>
    </form> 
       
</div>
   @else
<div class="alert alert-danger" role="alert" style="margin-top:100px;padding:50px;">
    {{ trans('cruds.bigBrother.no_suitable') }}
</div>

@endif