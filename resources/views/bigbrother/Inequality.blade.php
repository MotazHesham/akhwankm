@extends('layouts.bigbrother')
@section('content')
@if (!$brotherhood->small_brother_id)
<div class="alert alert-warning">
    <h2>
        لم يتم التعاقد بعد
    </h2>
</div>
@else
<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.inequality.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("bigbrother.inequalities.store") }}" enctype="multipart/form-data">
            @csrf
          <input type="hidden" name="specialist_id" value={{$brotherhood->specialist_id}}>
          <input type="hidden" name="big_brother_id" value={{$brotherhood->id}}>
          <input type="hidden" name="small_brother_id" value={{$brotherhood->small_brother_id}}>
          <input type="hidden" name="user_id" value={{Auth::id()}}>
            <div class="form-group">
                <label class="required" for="date">{{ trans('cruds.inequality.fields.date') }}</label>
                <input class="form-control date {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text" name="date" id="date" value="{{ old('date') }}" required>
                @if($errors->has('date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.inequality.fields.date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="reasons">{{ trans('cruds.inequality.fields.reasons') }}</label>
                <textarea class="form-control {{ $errors->has('reasons') ? 'is-invalid' : '' }}" name="reasons" id="reasons" required>{{ old('reasons') }}</textarea>
                @if($errors->has('reasons'))
                    <div class="invalid-feedback">
                        {{ $errors->first('reasons') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.inequality.fields.reasons_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>


@endif
@endsection