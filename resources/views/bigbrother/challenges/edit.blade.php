@extends('layouts.bigbrother')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.challenge.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("bigbrother.challenges.update", [$challenge->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="challengs">{{ trans('cruds.challenge.fields.challenge') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('challengs') ? 'is-invalid' : '' }}" name="challengs[]" id="challengs" multiple required onchange="checkvalue()">>
                    @foreach($challengs as $id => $challeng)
                        <option value="{{ $id }}" {{ (in_array($id, old('challengs', [])) || $challenge->challengs->contains($id)) ? 'selected' : '' }}>{{ $challeng }}</option>
                    @endforeach
                </select>
                @if($errors->has('challengs'))
                    <div class="invalid-feedback">
                        {{ $errors->first('challengs') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.challenge.fields.challeng_helper') }}</span>
                <input class="form-control" type="text" name="other" id="other" placeholder="أكتب نوع التحدي"
                style='display:none;' />
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
    function checkvalue() {

        var x = document.getElementById("challengs").value;

        if (x==20) {
            document.getElementById('other').style.display = 'block';
        } else {
            document.getElementById('other').style.display = 'none';
        }
    }
</script>
@endsection